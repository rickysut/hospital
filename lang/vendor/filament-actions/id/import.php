<?php

return [

    'label' => 'Unggah :label',

    'modal' => [

        'heading' => 'Unggah :label',

        'form' => [

            'file' => [
                'label' => 'File',
                'placeholder' => 'Unggah file CSV',
            ],

            'columns' => [
                'label' => 'Kolom',
                'placeholder' => 'Pilih kolom',
            ],

        ],

        'actions' => [

            'download_example' => [
                'label' => 'Unduh contoh berkas CSV',
            ],

            'import' => [
                'label' => 'Unggah',
            ],

        ],

    ],

    'notifications' => [

        'completed' => [

            'title' => 'Unggah selesai',

            'actions' => [

                'download_failed_rows_csv' => [
                    'label' => 'Unduh informasi baris yang gagal diunggah',
                ],

            ],

        ],

        'max_rows' => [
            'title' => 'Ukuran berkas CSV terlalu besar',
            'body' => 'Anda tidak dapat mengunggah lebih dari :count baris sekaligus.',
        ],

        'started' => [
            'title' => 'Unggah dimulai',
            'body' => 'Mulai mengunggah :count baris dan proses akan berjalan di belakang layar.',
        ],

    ],

    'example_csv' => [
        'file_name' => 'contoh-:importer',
    ],

    'failure_csv' => [
        'file_name' => 'impor-:import_id-:csv_name-gagal',
        'error_header' => 'kesalahan',
        'system_error' => 'Terjadi kesalahan sistem, harap hubungi tim support.',
    ],

];
