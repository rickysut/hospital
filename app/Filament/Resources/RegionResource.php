<?php

namespace App\Filament\Resources;

use App\Filament\Imports\RegionImporter;
use App\Filament\Resources\RegionResource\Pages;
use App\Filament\Resources\RegionResource\RelationManagers;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegionResource extends Resource
{
    protected static ?string $model = Region::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'Acuan Data';

    protected static ?string $modelLabel = 'Data Wilayah';

    protected static ?string $pluralModelLabel = 'Data Wilayah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode')
                  ->required()
                  ->maxLength(255),
                TextInput::make('nama')
                  ->required()
                  ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->headerActions([
            //     ImportAction::make(__('filament::resources/region.import.label'))
            //         ->importer(RegionImporter::class)
            // ])
            ->columns([
                TextColumn::make('kode')->searchable()->sortable(),
                TextColumn::make('nama')->searchable()->sortable(),
            ])
            ->filters([
                // Filter::make('kode')
                // ->form([
                //     TextInput::make('kode'),
                //     TextInput::make('nama'),
                // ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRegions::route('/'),
            'create' => Pages\CreateRegion::route('/create'),
            'edit' => Pages\EditRegion::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string 
    {   
        return __('filament::resources/region.label');
    }

    public static function getPluralModelLabel(): string 
    {   
        return __('filament::resources/region.plural_label');
    }

    public static function getNavigationGroup():?string
    {
        return __('filament::resources/region.nav_groups');
    }
}
