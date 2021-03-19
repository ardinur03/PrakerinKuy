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
        'deskripsi_perusahaan',
        'kuota_perusahaan',
        'jenis_id',
        'kode_pos',
        'long',
        'lat',
        'image'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function getData()
    {
        return DB::table('perusahaan')->latest()->get();
    }

    public function getDataPerusahaan()
    {
        return DB::table('perusahaan')->join('jenis_perusahaan', 'perusahaan.jenis_id', '=', 'jenis_perusahaan.id')
            ->select('perusahaan.*', 'jenis_perusahaan.*')->get();
    }
}
