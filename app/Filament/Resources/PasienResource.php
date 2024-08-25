<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\Registration;
use App\Filament\Resources\PasienResource\Pages;
use App\Filament\Resources\PasienResource\RelationManagers;
use App\Models\Pasien;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function table(Table $table): Table
    {
        return $table
            
            ->columns([
                TextColumn::make('nama')->label(__('filament::resources/pasien.field.nama'))->searchable()->sortable(),
                TextColumn::make('no_rm')->label(__('filament::resources/pasien.field.no_rm'))->searchable()->sortable(),
                TextColumn::make('nik')->label('NIK')->searchable()->sortable(),
                TextColumn::make('tanggal_lahir')
                    ->label(__('filament::resources/pasien.field.tanggal_lahir'))
                    ->date('d/m/Y'),
            ])
            ->filters([
                Filter::make('Filter')
                ->form([
                    TextInput::make('nama')->label(__('filament::resources/pasien.field.nama')),
                    TextInput::make('no_rm')->label(__('filament::resources/pasien.field.no_rm')),
                    TextInput::make('nik'),
                    DatePicker::make('tanggal_lahir')->label(__('filament::resources/pasien.field.tanggal_lahir')),
                ])
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasien::route('/'),
            'create' => Pages\CreatePasien::route('/create'),
            'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }

    public static function getHeading(): string  
    {
        return __('filament::resources/pasien.heading');
    }

    public static function getModelLabel(): string 
    {   
        return __('filament::resources/pasien.label');
    }

    public static function getPluralModelLabel(): string 
    {   
        return __('filament::resources/pasien.plural_label');
    }

    public static function getNavigationGroup():?string
    {
        return __('filament::resources/pasien.nav_groups');
    }

    public static function getBreadcrumb(): string
    {
        return __('filament::resources/pasien.nav_groups');
    }}
