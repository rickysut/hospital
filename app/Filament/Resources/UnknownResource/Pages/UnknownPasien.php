<?php

namespace App\Filament\Resources\UnknownResource\Pages;

use App\Enums\JenisPasien;
use App\Filament\Resources\UnknownResource;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\Rules\Enum;

class UnknownPasien extends CreateRecord
{
    use HasWizard;

    protected static string $resource = UnknownResource::class;

    protected static ?string $title = 'Pasien Tdk Dikenali';

    public function form(Form $form): Form
    {

        return parent::form($form)
            ->schema([
                Wizard::make([
                    Wizard\Step::make(__('filament::resources/pasien-unknown.wizard.head_1'))
                        ->schema([
                            TextInput::make('nama')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.nama') . ' (optional)')
                                ,
                            TextInput::make('no_rm')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-umum.field.no_rm'))
                                ->required(),
                            Select::make('perkiraan_umur')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-unknown.field.perkiraan_umur'))
                                ->options([
                                    1 => __('filament::resources/pasien-unknown.umur.1'),
                                    2 => __('filament::resources/pasien-unknown.umur.2'),
                                    3 => __('filament::resources/pasien-unknown.umur.3'),
                                    4 => __('filament::resources/pasien-unknown.umur.4'),
                                    5 => __('filament::resources/pasien-unknown.umur.5'),
                                    6 => __('filament::resources/pasien-unknown.umur.6'),
                                ]),
                            TextInput::make('lokasi_ditemukan')
                                ->hiddenLabel()
                                ->placeholder(__('filament::resources/pasien-unknown.field.lokasi_ditemukan')),
                            DatePicker::make('tgl_ditemukan')
                                ->label(__('filament::resources/pasien-unknown.field.tgl_ditemukan'))
                                ,
                        ])->columns(2),
                    Wizard\Step::make(__('filament::resources/pasien-unknown.wizard.head_2'))
                        ->schema([
                            Fieldset::make(__('filament::resources/pasien-unknown.wizard.head_4'))
                            ->schema([
                                TextInput::make('nama_penanggung')
                                    ->hiddenLabel()
                                    ->placeholder(__('filament::resources/pasien-unknown.field.nama_penanggung')),
                                Select::make('hubungan_penanggung')
                                    ->hiddenLabel()
                                    ->placeholder(__('filament::resources/pasien-unknown.field.hubungan_penanggung'))
                                    ->options([
                                        1 => __('filament::resources/pasien-unknown.hubungan.1'),
                                        2 => __('filament::resources/pasien-unknown.hubungan.2'),
                                        3 => __('filament::resources/pasien-unknown.hubungan.3'),
                                        4 => __('filament::resources/pasien-unknown.hubungan.4'),
                                        5 => __('filament::resources/pasien-unknown.hubungan.5'),
                                        6 => __('filament::resources/pasien-unknown.hubungan.6'),
                                    ]),
                                TextInput::make('no_telp_penanggung')
                                    ->hiddenLabel()
                                    ->mask('99999999999999999999')
                                    ->placeholder(__('filament::resources/pasien-unknown.field.no_telp_penanggung')),
                            ]),
                            Fieldset::make(__('filament::resources/pasien-unknown.wizard.head_3'))
                            ->schema([
                                TextInput::make('nama_pengantar')
                                    ->hiddenLabel()
                                        ->placeholder(__('filament::resources/pasien-unknown.field.nama_pengantar')),
                                TextInput::make('no_telp_pengantar')
                                    ->hiddenLabel()
                                    ->mask('99999999999999999999')
                                    ->placeholder(__('filament::resources/pasien-unknown.field.no_telp_pengantar')),
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
            ])->columns(1);
    }

    public function getBreadcrumb(): string
    {
        return static::$breadcrumb ?? __('filament::resources/pasien-unknown.label');
    }

    public function getTitle(): string
    {
        return  __('filament::resources/pasien-unknown.heading');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        $data['type'] = 1;
        return $data;
    }

    
}
