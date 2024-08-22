<?php

namespace App\Models;

use App\Enums\Agama;
use App\Enums\Gender;
use App\Enums\Hubungan;
use App\Enums\JenisPasien;
use App\Enums\Marital;
use App\Enums\Pekerjaan;
use App\Enums\Pendidikan;
use App\Enums\Umur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'Pasien';

    protected $fillable = [
            'type', //0: biasa ; 1: tidak dikenal; 2 bayi
            'nama', // nama lengkap
            'no_rm', // no rekam medis
            'nik', // nik 16 numeric
            'id_wna',   // id lain jika wna
            'ibu_kandung',  //  nama ibu kandung
            'tempat_lahir', // tempat lahir
            'tanggal_lahir', // tanggal_lahir 
            'gender', // jenis kelamin 0: tdk diketahui, 1: laki, 2: perempuan, 3: tdk dpt ditentukan, 4: tidak mmengisi
            'agama',  
            'suku',  // suku
            'bahasa', // bahasa yg dikuasai
            'alamat', // alamat lengkap
            'rt', // RT
            'rw', // RW
            'kelurahan', // desa / kelurahan dari data acuan wilayah
            'kecamatan', // dari data acuan wilayah
            'kota', // kota / kabupaten dari data acuan wilayah
            'kode_pos', // dari data acuan wilayah
            'provinsi', // dari data acuan wilayah
            'negara', // negara
            'alamat_domisili', // alamat domisili
            'dom_rt',  // rt domisili
            'dom_rw',  //  rt domisili
            'dom_kelurahan', // dari data acuan wilayah
            'dom_kecamatan', // dari data acuan wilayah
            'dom_kota', // dari data acuan wilayah
            'dom_kode_pos', // dari data acuan wilayah
            'dom_provinsi', // dari data acuan wilayah
            'dom_negara',
            'no_telp', // no telp rumah / tmpt tinggal
            'no_hp', // no hp
            'pendidikan',
            'pekerjaan',
            'status_pernikahan', 
            //bagian pasien tidak dikenal
            'perkiraan_umur',
            'lokasi_ditemukan', 
            'tgl_ditemukan',
            //identitas penanggung
            'nama_penanggung',
            'hubungan_penanggung', 
            'no_telp_penanggung',
            'nama_pengantar',
            'no_telp_pengantar',
            //identitas pengantar pasien
            'nama_pengantar',
            'hp_penanggung',
            //bayi
            'nama_bayi',
            'nama_ibu_bayi',
            'tanggal_lahir_bayi',
            'jam_lahir_bayi'
    ]; 

    protected $casts = [
        'type' => JenisPasien::class,
        'gender' => Gender::class,
        'agama' => Agama::class,
        'pendidikan' => Pendidikan::class,
        'pekerjaan' => Pekerjaan::class,
        'status_pernikahan' => Marital::class,
        'hubungan_penanggung' => Hubungan::class,
        'perkiraan_umur' => Umur::class,
    ];

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Regions::class, 'provinsi', 'kode');
    }

}
