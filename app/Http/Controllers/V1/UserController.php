<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\SignInRequest;
use App\Http\Requests\V1\User\SignUpRequest;
use App\Http\Requests\V1\User\VerificationRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Services\TwilioService;
use App\Services\UserService;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Header;
use Knuckles\Scribe\Attributes\Subgroup;
use Knuckles\Scribe\Attributes\Authenticated;
use Twilio\Exceptions\RestException;

#[Group('User')]
class UserController extends Controller
{
    public function __construct(private UserService $userService, private TwilioService $twilioService)
    {
    }

    #[Subgroup('Auth')]
    #[Endpoint('Sign Up')]
    public function signUp(SignUpRequest $request)
    {
        return $this->userService->createRecord($request->validated());
    }
    #[Subgroup('Auth')]
    #[Endpoint('Sign In')]
    public function signIn(SignInRequest $request)
    {
        $user = User::where('phone', $request->input('phone'))->firstOrFail();
        return $user->createToken(mt_rand(0, 100))->plainTextToken;

        return $this->twilioService->sendFerifyCode($request->post('phone'));
    }

    #[Subgroup('Auth')]
    #[Endpoint('SMS Verification')]
    public function verification(VerificationRequest $request)
    {
        try {
            $twilioStatus = $this->twilioService->validateVerificationCode($request->post('phone'), $request->post('code'));
            $result = $this->userService->phoneVerification($twilioStatus, $request->post('phone'));

            if ($result === false) {
                return [
                    'result' => false,
                ];
            }

            return $result;
        } catch (RestException $exception) {
            return [
                'result' => false,
            ];
        }
    }

    #[Subgroup('Profile')]
    #[Authenticated]
    #[Endpoint('Get profile')]
    #[Header('Authorization', 'Bearer ')]
    public function profile()
    {
        return new UserResource(auth()->user());
    }

    #[Subgroup('Profile')]
    #[Authenticated]
    #[Endpoint('Delete profile')]
    #[Header('Authorization', 'Bearer ')]
    public function delete()
    {
        return auth()->user()->delete();
    }
}
