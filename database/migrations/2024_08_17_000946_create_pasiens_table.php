<?php

use App\Enums\Agama;
use App\Enums\Gender;
use App\Enums\Hubungan;
use App\Enums\JenisPasien;
use App\Enums\Marital;
use App\Enums\Pekerjaan;
use App\Enums\Pendidikan;
use App\Enums\Umur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type'); //0: biasa ; 1: tidak dikenal; 2 bayi
            $table->string('nama')->nullable(); // nama lengkap
            $table->string('no_rm')->unique(); // no rekam medis
            $table->string('nik',16)->nullable(); // nik 16 numeric
            $table->string('id_wna')->nullable();   // id lain jika wna
            $table->string('ibu_kandung')->nullable();  //  nama ibu kandung
            $table->string('tempat_lahir')->nullable(); // tempat lahir
            $table->date('tanggal_lahir')->nullable(); // tanggal_lahir 
            $table->enum('gender', Gender::values())->nullable();
            $table->enum('agama', Agama::values())->nullable();  
            $table->string('suku')->nullable();  // suku
            $table->string('bahasa')->nullable(); // bahasa yg dikuasai
            $table->string('alamat')->nullable(); // alamat lengkap
            $table->string('rt',3)->nullable(); // RT
            $table->string('rw',3)->nullable(); // RW
            $table->string('kelurahan')->nullable(); // desa / kelurahan dari data acuan wilayah
            $table->string('kecamatan')->nullable(); // dari data acuan wilayah
            $table->string('kota')->nullable(); // kota / kabupaten dari data acuan wilayah
            $table->string('kode_pos')->nullable(); // dari data acuan wilayah
            $table->string('provinsi')->nullable(); // dari data acuan wilayah
            $table->string('negara')->nullable(); // negara
            $table->text('alamat_domisili')->nullable(); // alamat domisili
            $table->string('dom_rt',3)->nullable();  // rt domisili
            $table->string('dom_rw',3)->nullable();  //  rt domisili
            $table->string('dom_kelurahan')->nullable(); // dari data acuan wilayah
            $table->string('dom_kecamatan')->nullable(); // dari data acuan wilayah
            $table->string('dom_kota')->nullable(); // dari data acuan wilayah
            $table->string('dom_kode_pos')->nullable(); // dari data acuan wilayah
            $table->string('dom_provinsi')->nullable(); // dari data acuan wilayah
            $table->string('dom_negara')->nullable();
            $table->string('no_telp')->nullable(); // no telp rumah / tmpt tinggal
            $table->string('no_hp')->nullable(); // no hp
            $table->enum('pendidikan', Pendidikan::values())->nullable(); 
            $table->enum('pekerjaan',Pekerjaan::values())->nullable();
            $table->enum('status_pernikahan', Marital::values())->nullable(); 
            //bagian pasien tidak dikenal
            $table->enum('perkiraan_umur',Umur::values())->nullable();
            $table->text('lokasi_ditemukan')->nullable(); 
            $table->date('tgl_ditemukan')->nullable();
            //identitas penanggung
            $table->string('nama_penanggung')->nullable();
            $table->enum('hubungan_penanggung', Hubungan::values())->nullable();
            $table->string('no_telp_penanggung',25)->nullable();
            //identitas pengantar pasien
            $table->string('nama_pengantar')->nullable();
            $table->string('no_telp_pengantar')->nullable();
            //bayi
            $table->string('nama_bayi')->nullable();
            $table->string('nama_ibu_bayi')->nullable();
            $table->date('tanggal_lahir_bayi')->nullable();
            $table->integer('jam_lahir_bayi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
