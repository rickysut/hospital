<?php
return [
    'nav_groups' => 'Pendaftaran',
    'label' => 'Pasien Tdk Dikenali',
    'plural_label' => 'Pasien Tdk Dikenali',
    'heading' => 'Pasien Tdk Dikenali',
    'sub_heading' => 'Detail pasien',
    'field' => [
        'nama' => 'Nama lengkap',
        'no_rm' => 'No Rekam Medis',
        'nik' => 'NIK',
        
        //unknown
        'perkiraan_umur' => 'Perkiraan Umur', 
        'lokasi_ditemukan' => 'Lokasi Ditemukan', 
        'tgl_ditemukan' => 'Tanggal Ditemukan', 
        //identitas penanggung
        'nama_penanggung' => 'Nama Penanggung',
        'hubungan_penanggung' => 'Hubungan Penanggung', 
        'no_telp_penanggung' => 'No Telp Penanggung',
        'nama_pengantar' => 'Nama Pengantar',
        'no_telp_pengantar' => 'No Telp Pengantar',
        
        'created_at' => 'Dibuat tgl',
    ],
    'wizard' => [
        'head_1' => 'Informasi',
        'head_2' => 'Penanggung & Pengantar',
        'head_3' => 'Pengantar',
        'head_4' => 'Penanggung',
        'button_copy' => 'Copy dari identitas',
    ],
    'import' => [
        'label' => 'Unggah',
        'notif' => 'Data pasien selesai diunggah dan ',
        'row' => 'baris',
        'success' => ' ter-unggah',
        'fail' => ' gagal.'
    ],
    'gender' => [
        '0' => 'Tidak Diketahui',
        '1' => 'Laki-Laki',
        '2' => 'Perempuan',
        '3' => 'Tidak Dapat Ditentukan',
        '4' => 'Tidak Mengisi',
    ],
    'religion' => [
        '1' => 'Islam',
        '2' => 'Kristen',
        '3' => 'Katolik',
        '4' => 'Hindu',
        '5' => 'Budha',
        '6' => 'Konghucu',
        '7' => 'Penghayat',
        '8' => 'Lain-lain' 
    ],
    'pendidikan' => [
        '0' => 'Tidak sekolah', 
        '1' => 'SD',
        '2' => 'SLTP sederajat', 
        '3' => 'SLTA sederajat', 
        '4' => 'D1-D3 sederajat', 
        '5' => 'D4',
        '6' => 'S1',
        '7' => 'S2',
        '8' => 'S3'
    ],
    'pekerjaan' => [
        '0' => 'Tidak bekerja', 
        '1' => 'PNS',
        '2' => 'TNI/POLRI', 
        '3' => 'BUMN',
        '4' => 'Pegawai Swasta/ Wirausaha',
        '5' => 'Lain-lain', 
    ],
    'marital' => [
        '1' => 'Belum Kawin', 
        '2' => 'Kawin',
        '3' => 'Cerai Hidup', 
        '4' => 'Cerai Mati',
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
        '1' => 'Diri Sendiri',
        '2' => 'Orang Tua',
        '3' => 'Anak',
        '4' => 'Suami/Istri',
        '5' => 'Kerabat/Saudara', 
        '6' => 'Lain-lain',
    ]
   
];