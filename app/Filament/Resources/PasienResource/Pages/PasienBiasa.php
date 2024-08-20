<?php

namespace App\Filament\Resources\PasienResource\Pages;

use App\Filament\Resources\PasienResource;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class PasienBiasa extends CreateRecord
{
    use HasWizard;

    protected static string $resource = PasienResource::class;

    public function form(Form $form): Form
    {
        return parent::form($form)
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Data diri')
                        ->schema([
                            
                                TextInput::make('nama')
                                    ->hiddenLabel()
                                    ->placeholder('Nama Lengkap')
                                    ->required(),
                                TextInput::make('no_rm')
                                    ->hiddenLabel()
                                    ->placeholder('No Rekam Medis')
                                    ->required(),
                                TextInput::make('nik')
                                    ->hiddenLabel()
                                    ->numeric()
                                    ->inputMode('decimal')
                                    ->length(16)
                                    ->placeholder('NIK'), 
                                TextInput::make('id_wna')
                                    ->hiddenLabel()
                                    ->placeholder('Nomor Paspor / KITAS (untuk WNA)'),
                                TextInput::make('ibu_kandung')
                                    ->hiddenLabel()
                                    ->placeholder('Nama Ibu Kandung'),
                                Select::make('gender')
                                    ->hiddenLabel()
                                    ->placeholder('Jenis Kelamin')
                                    ->required()
                                    ->options([
                                        0 => 'Tidak Diketahui',
                                        1 => 'Laki-Laki',
                                        2 => 'Perempuan',
                                        3 => 'Tidak Dapat Ditentukan',
                                        4 => 'Tidak Mengisi',
                                    ]),
                                
                            
                                
                            // Fieldset::make('Tempat & tgl lahir')
                            //     ->schema([
                                    
                                    TextInput::make('tempat_lahir')
                                        ->hiddenLabel()
                                        ->datalist([
                                            'ACEH',
                                            'SUMATERA UTARA',
                                            'SUMATERA BARAT',
                                            'RIAU',
                                            'JAMBI',
                                            'SUMATERA SELATAN',
                                            'BENGKULU',
                                            'LAMPUNG',
                                            'KEP. BANGKA BELITUNG',
                                            'KEP. RIAU',
                                            'DKI JAKARTA',
                                            'JAWA BARAT',
                                            'JAWA TENGAH',
                                            'DI YOGYAKARTA',
                                            'JAWA TIMUR',
                                            'BANTEN',
                                            'BALI',
                                            'NUSA TENGGARA BARAT',
                                            'NUSA TENGGARA TIMUR',
                                            'KALIMANTAN BARAT',
                                            'KALIMANTAN TENGAH',
                                            'KALIMANTAN SELATAN',
                                            'KALIMANTAN TIMUR',
                                            'KALIMANTAN UTARA',
                                            'SULAWESI UTARA',
                                            'SULAWESI TENGAH',
                                            'SULAWESI SELATAN',
                                            'SULAWESI TENGGARA',
                                            'GORONTALO',
                                            'MALUKU',
                                            'MALUKU UTARA',
                                            'PAPUA BARAT',
                                            'PAPUA'
                                            ])
                                        ->placeholder('Kota Kelahiran'), 
                                    DatePicker::make('tanggal_lahir')
                                        ->hiddenLabel()
                                        ->placeholder('Tanggal Lahir'), 
                                // ])->columns(2),  
                                
                            Fieldset::make('Lain-lain')
                                ->schema([        
                                Select::make('agama')
                                    ->hiddenLabel()     
                                    ->placeholder('Agama')
                                    ->required()
                                    ->options([
                                        1 => 'Islam',
                                        2 => 'Kristen',
                                        3 => 'Katolik',
                                        4 => 'Hindu',
                                        5 => 'Budha',
                                        6 => 'Konghucu',
                                        7 => 'Penghayat',
                                        8 => 'Lain-lain'  
                                    ]),
                                TextInput::make('suku')
                                    ->hiddenLabel()
                                    ->placeholder('Suku'),
                                TextInput::make('bahasa')
                                    ->hiddenLabel()
                                    ->placeholder('Bahasa yang dikuasai')
                            ])->columns(3)
                        ])->columns(2),
                    Wizard\Step::make('Domisili')
                        ->schema([
                            
                            TextInput::make('alamat')
                                ->hiddenLabel()
                                ->placeholder('Alamat lengkap saat ini'),
                            TextInput::make('rt')
                                ->hiddenLabel()
                                ->placeholder('RT'),
                            TextInput::make('rw')
                                ->hiddenLabel()
                                ->placeholder('RW'),
                            TextInput::make('kelurahan')
                                ->hiddenLabel()
                                ->placeholder('Kelurahan'),
                            TextInput::make('kecamatan')
                                ->hiddenLabel()
                                ->placeholder('Kecamatan'),
                            TextInput::make('kota')
                                ->hiddenLabel()
                                ->placeholder('Kota'),
                            TextInput::make('kode_pos')
                                ->hiddenLabel() 
                                ->placeholder('Kode Pos'),
                            TextInput::make('provinsi')
                                ->hiddenLabel() 
                                ->placeholder('Provinsi'),
                            TextInput::make('negara')
                                ->hiddenLabel() 
                                ->placeholder('Negara'),
                            
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
}
