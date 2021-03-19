<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengajuanSiswa extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_sp';

    protected $guarded = ['id'];

    public function getDataPengajuan()
    {
        return DB::table('pengajuan')
            ->join('siswa', 'pengajuan.siswa_nis', '=', 'siswa.nis')
            ->join('perusahaan', 'pengajuan.kode_perusahaan', '=', 'perusahaan.kode_perusahaan')
            ->join('jurusan', 'jurusan.id', '=', 'siswa.jurusan_id')

            ->select('pengajuan.*', 'siswa.nis', 'siswa.nama_siswa', 'jurusan.nama_jurusan', 'siswa.kelas', 'siswa.jk_siswa', 'siswa.alamat', 'siswa.kontak_siswa', 'siswa.angkatan', 'perusahaan.nama_perusahaan', 'perusahaan.alamat_perusahaan', 'perusahaan.email_perusahaan', 'perusahaan.jenis_perusahaan', 'perusahaan.jenis_id')->latest()
            ->get();
    }
}
