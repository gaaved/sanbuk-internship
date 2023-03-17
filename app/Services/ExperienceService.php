<?php

namespace App\Services;

use App\Models\Experience;
use App\Models\Package;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;

class ExperienceService
{
    public function filter(array $filterParams = null)
    {
        $experiences = Experience::query();

        if ($filterParams === null) {
            return $experiences->get();
        }
        if ($filterParams !== null) {
            foreach ($filterParams as $key => $values) {
                if ($key === 'type') {
                    $experiences->with('type')
                        ->whereHas('type', function (Builder $query) use ($values) {
                            $query->whereIn('id', $values);
                        });
                }

                if ($key === 'trip_type') {
                    $experiences->with('tripType')
                        ->whereHas('tripType', function (Builder $query) use ($values) {
                            $query->whereIn('id', $values);
                        });
                }

                if ($key === 'vendor') {
                    $experiences->with('vendor')
                        ->whereHas('vendor', function (Builder $query) use ($values) {
                            $query->whereIn('id', $values)->where('status', Vendor::STATUS_ACTIVE);
                        });
                }

                if ($key === 'packages') {
                    $experiences->with('packages')
                        ->whereHas('packages', function (Builder $query) use ($values) {
                            $query->where('start_of_activity','<=' , $values['to'])
                                ->where('and_of_activity', '>=', $values['from'])
                                ->where('status', Package::STATUS_ACTIVE);
                        });
                }
            }
        }
        return $experiences->get();
    }
}
