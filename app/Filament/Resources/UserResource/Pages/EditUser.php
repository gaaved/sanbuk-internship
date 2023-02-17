<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Form;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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
                Select::make('status')
                    ->reactive()
                    ->options(User::STATUS_LIST)
                    ->afterStateUpdated(function (callable $set) {
                        $set('password', null);
                    }),
                TextInput::make('email')->label('Email edit'),
                TextInput::make('password')->label('Password edit'),
            ]);
    }
}
