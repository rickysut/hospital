<?php

namespace App\Filament\Resources\RegionResource\Pages;

use App\Filament\Imports\RegionImporter;
use App\Filament\Resources\RegionResource;
use App\Imports\RegionImport;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Collection;

class ListRegions extends ListRecords
{
    protected static string $resource = RegionResource::class;

    protected function getHeaderActions(): array
    {
        set_time_limit(1300);
        return [
            // \EightyNine\ExcelImport\ExcelImportAction::make(__('filament::resources/region.import.label'))
            // // ->slideOver()
            // ->color("primary")
            // ->validateUsing([
            //     'kode' => 'required',
            //     'nama' => 'required',
            // ])
            // // ->processCollectionUsing(function (string $modelClass, Collection $collection) {
            // //     // Do some stuff with the collection
            // //     return $collection;
            // // })
            // ->use(RegionImport::class)
            // ,
            Actions\ImportAction::make(__('filament::resources/region.import.label'))
                ->importer(RegionImporter::class)->chunkSize(2500)->csvDelimiter(';'),   
            Actions\CreateAction::make(),
        ];
    }
}
