<?php

namespace App\Filament\Resources\PasienResource\Pages;

use App\Filament\Clusters\Registration;
use App\Filament\Resources\PasienResource;
use App\Models\Region;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Filament\Resources\Pages\ListRecords;

class PasienBiasa extends CreateRecord
{
    use HasWizard;

    protected static string $resource = PasienResource::class;

    protected static ?string $title = 'Pasien Umum';

    public function form(Form $form): Form
    {

        return parent::form($form)
            ->schema([
                Wizard::make([
                    Wizard\Step::make(__('filament::resources/pasien-umum.wizard.head_1'))
                        ->schema([

                            TextInput::make('nama')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.nama'))
                                ->required(),
                            TextInput::make('no_rm')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.no_rm'))
                                ->required(),
                            TextInput::make('nik')
                                ->hiddenLabel()
                                ->mask('9999999999999999')
                                ->length(16)
                                ->placeholder('NIK'),
                            TextInput::make('id_wna')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.id_wna')),
                            TextInput::make('ibu_kandung')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.ibu_kandung')),
                            Select::make('gender')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.gender'))
                                ->required()
                                ->options([
                                    0 => __('filament::resources/pasien-umum.gender.0'),
                                    1 => __('filament::resources/pasien-umum.gender.1'),
                                    2 => __('filament::resources/pasien-umum.gender.2'),
                                    3 => __('filament::resources/pasien-umum.gender.3'),
                                    4 => __('filament::resources/pasien-umum.gender.4'),
                                ]),

                            TextInput::make('tempat_lahir')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.tempat_lahir')),
                            DatePicker::make('tanggal_lahir')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.tanggal_lahir')),

                            Fieldset::make('Lain-lain')
                                ->schema([
                                    Select::make('agama')
                                        ->hiddenLabel()
                                        ->placeholder(__('filament::resources/pasien-umum.field.agama'))
                                        ->options([
                                            1 => __('filament::resources/pasien-umum.religion.1'),
                                            2 => __('filament::resources/pasien-umum.religion.2'),
                                            3 => __('filament::resources/pasien-umum.religion.3'),
                                            4 => __('filament::resources/pasien-umum.religion.4'),
                                            5 => __('filament::resources/pasien-umum.religion.5'),
                                            6 => __('filament::resources/pasien-umum.religion.6'),
                                            7 => __('filament::resources/pasien-umum.religion.7'),
                                            8 => __('filament::resources/pasien-umum.religion.8'),
                                        ]),
                                    TextInput::make('suku')
                                        ->hiddenLabel()
                                        ->placeholder(__('filament::resources/pasien-umum.field.suku')),
                                    TextInput::make('bahasa')
                                        ->hiddenLabel()
                                        ->placeholder(__('filament::resources/pasien-umum.field.bahasa'))
                                ])->columns(3)
                        ])->columns(2),
                    Wizard\Step::make(__('filament::resources/pasien-umum.wizard.head_2'))
                        ->schema([

                            TextInput::make('alamat')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.alamat')),
                            TextInput::make('rt')
                                ->hiddenLabel()
                                ->mask('999')
                                ->placeholder('RT'),
                            TextInput::make('rw')
                                ->hiddenLabel()
                                ->mask('999')
                                ->placeholder('RW'),
                            Select::make('kelurahan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.kelurahan'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 13')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama'))
                                ->afterStateUpdated(function (Get $get, Set $set)  { 
                                    $set('kecamatan', substr($get('kelurahan'),0,8));
                                    $set('kota', substr($get('kelurahan'),0,5));
                                    $set('provinsi', substr($get('kelurahan'),0,2));
                                })
                                ->live(),
                            Select::make('kecamatan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.kecamatan'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 8')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama'))
                                ,
                            Select::make('kota')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.kota'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 5')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama')),
                            Select::make('provinsi')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.provinsi'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 2')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama')),
                            TextInput::make('kode_pos')
                                ->hiddenLabel()
                                ->mask('99999')
                                ->placeholder(__('filament::resources/pasien-umum.field.kode_pos')),
                            TextInput::make('negara')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.negara')),

                        ])->columns(2),
                    Wizard\Step::make(__('filament::resources/pasien-umum.wizard.head_3'))
                        ->schema([

                            TextInput::make('alamat_domisili')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.alamat_domisili')),
                            TextInput::make('dom_rt')
                                ->hiddenLabel()
                                ->mask('999')
                                ->placeholder(__('filament::resources/pasien-umum.field.dom_rt')),
                            TextInput::make('dom_rw')
                                ->hiddenLabel()
                                ->mask('999')
                                ->placeholder('RW sesuai domisili'),
                            Select::make('dom_kelurahan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.dom_kelurahan'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 13')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama'))
                                ->afterStateUpdated(function (Get $get, Set $set)  { 
                                    $set('dom_kecamatan', substr($get('dom_kelurahan'),0,8));
                                    $set('dom_kota', substr($get('dom_kelurahan'),0,5));
                                    $set('dom_provinsi', substr($get('dom_kelurahan'),0,2));
                                })
                                ->live(),
                            Select::make('dom_kecamatan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.dom_kecamatan'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 8')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama')),
                            Select::make('dom_kota')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.dom_kota'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 5')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama')),
                            
                            Select::make('dom_provinsi')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.dom_provinsi'))
                                ->searchable(['nama'])
                                ->selectablePlaceholder(false)
                                ->getSearchResultsUsing(fn(string $search): array => Region::where('nama', 'like', "%{$search}%")->whereRaw('LENGTH(kode) = 2')->limit(10)->pluck('nama', 'kode')->toArray())
                                ->getOptionLabelUsing(fn ($value): ?string => Region::where('kode', $value)->value('nama')),
                            TextInput::make('dom_kode_pos')
                                ->hiddenLabel()
                                ->mask('99999')
                                ->placeholder(__('filament::resources/pasien-umum.field.dom_kode_pos')),
                            TextInput::make('dom_negara')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.dom_negara')),
                            Actions::make([
                                Action::make(__('filament::resources/pasien-umum.wizard.button_copy'))
                                    ->action(function (Get $get, Set $set) {
                                        $set('alamat_domisili', str($get('alamat')));
                                        $set('dom_rt', str($get('rt')));
                                        $set('dom_rw', str($get('rw')));
                                        $set('dom_kelurahan', $get('kelurahan'));
                                        $set('dom_kecamatan', $get('kecamatan'));
                                        $set('dom_kota', $get('kota'));
                                        $set('dom_kode_pos', str($get('kode_pos')));
                                        $set('dom_provinsi', $get('provinsi'));
                                        $set('dom_negara', str($get('negara')));
                                    })
                            ]),


                        ])->columns(2),
                    Wizard\Step::make(__('filament::resources/pasien-umum.wizard.head_4'))
                        ->schema([
                            TextInput::make('no_telp')
                                ->hiddenLabel()
                                ->mask('999999999999999')
                                ->placeholder(__('filament::resources/pasien-umum.field.no_telp')),
                            TextInput::make('no_hp')
                                ->hiddenLabel()
                                ->mask('999999999999999')
                                ->placeholder(__('filament::resources/pasien-umum.field.no_hp')),
                            Select::make('pendidikan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.pendidikan'))
                                ->options([
                                    0 => __('filament::resources/pasien-umum.pendidikan.0'),
                                    1 => __('filament::resources/pasien-umum.pendidikan.1'),
                                    2 => __('filament::resources/pasien-umum.pendidikan.2'),
                                    3 => __('filament::resources/pasien-umum.pendidikan.3'),
                                    4 => __('filament::resources/pasien-umum.pendidikan.4'),
                                    5 => __('filament::resources/pasien-umum.pendidikan.5'),
                                    6 => __('filament::resources/pasien-umum.pendidikan.6'),
                                    7 => __('filament::resources/pasien-umum.pendidikan.7'),
                                    8 => __('filament::resources/pasien-umum.pendidikan.8'),
                                ]),
                            Select::make('pekerjaan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.pekerjaan'))
                                ->options([
                                    0 => __('filament::resources/pasien-umum.pekerjaan.0'),
                                    1 => __('filament::resources/pasien-umum.pekerjaan.1'),
                                    2 => __('filament::resources/pasien-umum.pekerjaan.2'),
                                    3 => __('filament::resources/pasien-umum.pekerjaan.3'),
                                    4 => __('filament::resources/pasien-umum.pekerjaan.4'),
                                    5 => __('filament::resources/pasien-umum.pekerjaan.5'),
                                ]),
                            Select::make('status_pernikahan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.status_pernikahan'))
                                ->options([
                                    1 => __('filament::resources/pasien-umum.marital.1'),
                                    2 => __('filament::resources/pasien-umum.marital.2'),
                                    3 => __('filament::resources/pasien-umum.marital.3'),
                                    4 => __('filament::resources/pasien-umum.marital.4'),
                                ]),

                        ])->columns(2),
                ])->skippable()
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                        >
                        {{ __('filament::components/button.save') }}
                    </x-filament::button>
                    BLADE))),
            ])
            ->columns(1);
    }

    public function getBreadcrumb(): string
    {
        return static::$breadcrumb ?? __('filament::resources/pasien-umum.label');
    }

    public function getTitle(): string
    {
        return  __('filament::resources/pasien-umum.heading');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 0;
        // dd($data);
        return $data;
    }
}
