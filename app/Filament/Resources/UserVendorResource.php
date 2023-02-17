<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserVendorResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserVendorResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Users-Vendor';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?string $slug = 'users-vendor';

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

            ])
            ->filters([

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
            'index' => Pages\ListUserVendors::route('/'),
            'create' => Pages\CreateUserVendor::route('/create'),
            'edit' => Pages\EditUserVendor::route('/{record}/edit'),
        ];
    }
}
