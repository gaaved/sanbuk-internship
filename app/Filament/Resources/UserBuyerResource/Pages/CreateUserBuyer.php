<?php

namespace App\Filament\Resources\UserBuyerResource\Pages;

use App\Filament\Resources\UserBuyerResource;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUserBuyer extends CreateRecord
{
    protected static string $resource = UserBuyerResource::class;
    protected static ?string $title = 'Create Buyer User';

    protected function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('url_user_picture')->avatar()->label('Avatar'),
                Select::make('status')
                    ->reactive()
                    ->options(User::STATUS_LIST)->required(),
                Select::make('type')
                    ->options([0 => 'BUYER'])
                    ->default(User::TYPE_USER)
                    ->disablePlaceholderSelection(),
                TextInput::make('first_name')->label('First name'),
                TextInput::make('last_name')->label('Last name'),
                TextInput::make('email')->label('Email'),
                TextInput::make('password')
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->label('Password'),
            ]);
    }
}
