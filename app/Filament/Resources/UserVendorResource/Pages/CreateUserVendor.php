<?php

namespace App\Filament\Resources\UserVendorResource\Pages;

use App\Filament\Resources\UserVendorResource;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUserVendor extends CreateRecord
{
    protected static string $resource = UserVendorResource::class;
    protected static ?string $title = 'Create Vendor User';

    protected function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('url_user_picture')->avatar()->label('Avatar'),
                Select::make('status')
                    ->reactive()
                    ->options(User::STATUS_LIST)->required(),
                Select::make('type')
                    ->options([1 => 'VENDOR'])
                    ->default(User::TYPE_VENDOR)
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
