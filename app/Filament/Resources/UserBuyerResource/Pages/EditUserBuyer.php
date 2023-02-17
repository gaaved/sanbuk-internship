<?php

namespace App\Filament\Resources\UserBuyerResource\Pages;

use App\Filament\Resources\UserBuyerResource;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditUserBuyer extends EditRecord
{
    protected static string $resource = UserBuyerResource::class;
    protected static ?string $title = 'Edit User Buyer';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('url_user_picture')->avatar()->label('Avatar'),
                Select::make('status')
                    ->reactive()
                    ->options(User::STATUS_LIST),
                TextInput::make('first_name')->label('First name'),
                TextInput::make('last_name')->label('Last name'),
                TextInput::make('email')->label('Email'),
                TextInput::make('password')
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->password()
                    ->label('Password'),
            ]);
    }
}
