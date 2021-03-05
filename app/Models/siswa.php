<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
  use HasFactory;

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
}
