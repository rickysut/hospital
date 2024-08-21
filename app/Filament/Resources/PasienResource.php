<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasienResource\Pages;
use App\Filament\Resources\PasienResource\RelationManagers;
use App\Models\Pasien;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    // protected static ?string $pluralModelLabel = 'Pasien';

    // protected static ?string $modelLabel = 'Pasien Biasa';

    // protected static ?string $navigationLabel = 'Pasien Biasa';
    
    // // protected static ?string $navigationParentItem = 'Pasien';    
    
    // protected static ?string $navigationGroup = 'Pendaftaran';   
    
    // protected static ?string $breadcrumb = 'Pendaftaran'; 




    public static function getPages(): array
    {
        return [
            'index' => Pages\PasienBiasa::route('/'),
            // 'create' => Pages\PasienBiasa::route('/create'),
            // 'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }

    public static function getHeading(): string  
    {
        return __('filament::resources/pasien-umum.heading');
    }

    public static function getModelLabel(): string 
    {   
        return __('filament::resources/pasien-umum.label');
    }

    public static function getPluralModelLabel(): string 
    {   
        return __('filament::resources/pasien-umum.plural_label');
    }

    public static function getNavigationGroup():?string
    {
        return __('filament::resources/pasien-umum.nav_groups');
    }

    public static function getBreadcrumb(): string
    {
        return __('filament::resources/pasien-umum.nav_groups');
    }}
