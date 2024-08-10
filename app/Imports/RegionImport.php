<?php

namespace App\Imports;

use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class RegionImport implements ToModel, WithBatchInserts, WithUpserts, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        return new Region([
            'kode' => $row['kode'],
            'nama' => $row['nama'],
        ]);
    }
    
    public function batchSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'kode';
    }

    public function chunkSize(): int
    {
        return 2000;
    }
}


