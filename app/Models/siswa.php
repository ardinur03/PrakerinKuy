<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
  use HasFactory;

  protected $guraded = [];

  protected $table = 'siswa';

  protected $primaryKey  = 'nis';
  public $incrementing = false;

  protected $guarded = [];

  protected $fillable = [
    'jurusan_id',
    'nis',
    'nama_siswa',
    'kelas',
    'alamat',
    'kontak_siswa',
    'angkatan',
    'jk_siswa'
  ];

  public function getData()
  {
    return DB::table('siswa')->leftjoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
      ->select('siswa.*', 'jurusan.nama_jurusan')->latest()
      ->get();
  }

  public static function search($search)
  {
    return empty($search) ? static::query()
      : static::where('nama_siswa', 'like', '%' . $search . '%')
      ->orWhere('nis', 'like', '%' . $search . '%');
  }

  public function getDataSiswaExcel()
  {
    return DB::table('siswa')->leftjoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
      ->select(['siswa.nis', 'siswa.nama_siswa', 'siswa.kelas', 'jurusan.nama_jurusan', 'siswa.jk_siswa', 'siswa.alamat', 'siswa.kontak_siswa', 'siswa.angkatan'])->get();
  }
}
