<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $primaryKey = 'kode_perusahaan';

    public $incrementing = false;

    protected $fillable = [
        'kode_perusahaan',
        'nama_perusahaan',
        'pimpinan_perusahaan',
        'email_perusahaan',
        'website_perusahaan',
        'kontak_perusahaan',
        'jenis_perusahaan',
        'alamat_perusahaan',
        'kota_perusahaan',
        'kode_pos',
        'long',
        'lat'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function getData()
    {
        return DB::table('perusahaan')->latest()->get();
    }
}
