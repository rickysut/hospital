<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('filament::resources/user.heading'))
                    ->description(__('filament::resources/user.sub_heading'))
                    ->aside()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        // Forms\Components\DateTimePicker::make('email_verified_at'),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->maxLength(255)
                            ->revealable()
                            ->hiddenOn(['view', 'edit']),
                        // Forms\Components\TextInput::make('custom_fields'),
                        // Forms\Components\TextInput::make('avatar_url')
                        //     ->maxLength(255),

                        // Forms\Components\Select::make('roles')
                        //     ->label(__('filament-spatie-roles-permissions::filament-spatie.field.roles'))
                        //     // ->options(Role::all()->pluck('name', 'id'))
                        //     ->multiple()
                        //     ->relationship('roles', 'name')
                        Forms\Components\Select::make('roles')
                            ->multiple()
                            ->label(__('filament-spatie-roles-permissions::filament-spatie.field.roles'))
                            ->relationship(
                                name: 'roles',
                                modifyQueryUsing: fn (Builder $query) => $query->orderBy('name'),
                            )
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} ({$record->guard_name})")
                            ->searchable(['name', 'guard_name']) // searchable on both name and guard_name        

                            // ->relationship(
                            //     name: 'roles',
                            //     titleAttribute: 'name',
                            //     modifyQueryUsing: function(Builder $query, Get $get) {
                            //         if (!empty($get('guard_name'))) {
                            //             $query->where('guard_name', $get('guard_name'));
                            //         }
                            //         if(Filament::hasTenancy()) {
                            //             return $query->where(config('permission.column_names.team_foreign_key'), Filament::getTenant()->id);
                            //         }
                            //         return $query;
                            //     }
                            // )
                            ->columnSpanFull()
                            ->preload(config('filament-spatie-roles-permissions.preload_roles', true)),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament::resources/user.field.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.role')),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament::resources/user.field.created_at'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('avatar_url')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.roles_and_permissions');
    }

    public static function getLabel(): ?string
    {
        return __('filament::resources/user.label');
    }
}
