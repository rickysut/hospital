<?php
return [
    'nav_groups' => 'Registration',
    'label' => 'Unknown Patient',
    'plural_label' => 'Unknown Patient',
    'heading' => 'Unknown Patient',
    'sub_heading' => 'Detail patient',
    'field' => [
        'nama' => 'Fullname',
        'no_rm' => 'No. Medical Record',
        'nik' => 'NIK',
        //unknown
        'perkiraan_umur' => 'Estimated age', 
        'lokasi_ditemukan' => 'Location Found', 
        'tgl_ditemukan' => 'Date Found', 
        //identitas penanggung
        'nama_penanggung' => 'Name of Insurer',
        'hubungan_penanggung' => 'Insurer Relationship', 
        'no_telp_penanggung' => 'Insurer\'s Phone Number',
        'nama_pengantar' => 'Patient\'s escorting name',
        'no_telp_pengantar' => 'Escorting Phone Number',
        

        'created_at' => 'Created at',
    ],
    'wizard' => [
        'head_1' => 'Information',
        'head_2' => 'Insurer & Escorter',
        'head_3' => 'Escorter',
        'head_4' => 'Insurer',
        'button_copy' => 'Copy from identity',
    ],
    'import' => [
        'label' => 'Import',
        'notif' => 'Patient data import has completed and ',
        'row' => 'row',
        'success' => ' imported',
        'fail' => ' failed to import'
    ],
    'gender' => [
        '0' => 'Unknown',
        '1' => 'Male',
        '2' => 'Female',
        '3' => 'Not Specifiable',
        '4' => 'No Filling',
    ],
    'religion' => [
        '1' => 'Islam',
        '2' => 'Christian',
        '3' => 'Catholic',
        '4' => 'Hindu',
        '5' => 'Buddhism',
        '6' => 'Confucianism',
        '7' => 'Believers',
        '8' => 'Other' 
    ],
    'pendidikan' => [
        '0' => 'No schooling', 
        '1' => 'Elementary',
        '2' => 'Junior high school', 
        '3' => 'Senior high school ', 
        '4' => 'D1-D3 degree', 
        '5' => 'Fourth degree',
        '6' => 'Bachelor',  
        '7' => 'Master',
        '8' => 'Doctoral'
    ],
    'pekerjaan' => [
        '0' => 'Not working', 
        '1' => 'Civil Servant',
        '2' => 'TNI/POLRI', 
        '3' => 'BUMN',
        '4' => 'Private Employee/ Entrepreneur',
        '5' => 'Others', 
    ],
    'marital' => [
        '1' => 'Unmarried', 
        '2' => 'Married',
        '3' => 'Divorce Life', 
        '4' => 'Death Divorce',
    ],
    'umur' => [
        '1' => '0 - 5',
        '2' => '6 - 11',
        '3' => '12 - 17',
        '4' => '18 - 40',
        '5' => '41 - 65',
        '6' => '> 65',
    ],
    'hubungan' => [
        '1' => 'Self',
        '2' => 'Parent',
        '3' => 'Child',
        '4' => 'Husband / Wife',
        '5' => 'Relatives / Siblings', 
        '6' => 'Others',
    ]
];