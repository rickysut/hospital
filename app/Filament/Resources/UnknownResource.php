<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnknownResource\Pages;
use App\Filament\Resources\UnknownResource\RelationManagers;
use App\Models\Pasien;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnknownResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    public static function getPages(): array
    {
        return [
            'index' => Pages\UnknownPasien::route('/'),
        ];
    }

    public static function getHeading(): string  
    {
        return __('filament::resources/pasien-unknown.heading');
    }

    public static function getModelLabel(): string 
    {   
        return __('filament::resources/pasien-unknown.label');
    }

    public static function getPluralModelLabel(): string 
    {   
        return __('filament::resources/pasien-unknown.plural_label');
    }

    public static function getNavigationGroup():?string
    {
        return __('filament::resources/pasien-unknown.nav_groups');
    }

    public static function getBreadcrumb(): string
    {
        return __('filament::resources/pasien-unknown.nav_groups');
    }
}
