<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserBuyerResource\Pages;
use App\Filament\Resources\UserBuyerResource\RelationManagers;
use App\Models\User;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserBuyerResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Users-Buyer';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $slug = 'users-buyers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserBuyers::route('/'),
            'create' => Pages\CreateUserBuyer::route('/create'),
            'edit' => Pages\EditUserBuyer::route('/{record}/edit'),
        ];
    }
}
