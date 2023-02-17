<?php

namespace App\Filament\Resources\UserBuyerResource\Pages;

use App\Filament\Resources\UserBuyerResource;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ListUserBuyers extends ListRecords
{
    protected static string $resource = UserBuyerResource::class;
    protected static ?string $title = 'Users Buyer';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create User Buyer'),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return User::query()->where('type', User::TYPE_USER);
    }

    protected function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('status')
                    ->enum(User::STATUS_LIST)
                    ->colors([
                        'danger' => User::STATUS_INACTIVE,
                        'primary' => User::STATUS_ACTIVE,
                    ]),
                ImageColumn::make('url_user_picture')->circular()->label('Avatar'),
                BadgeColumn::make('type')
                    ->enum(User::TYPE_LIST)
                    ->colors([
                        'secondary' => User::TYPE_USER,
                        'success' => User::TYPE_VENDOR,
                        'warning' => User::TYPE_ADMIN,
                    ]),
                TextColumn::make('full_name'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ]);
    }
}
