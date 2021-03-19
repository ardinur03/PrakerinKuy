<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHubin extends Model
{
    protected $table = 'admin_hubin';
    protected $primaryKey = 'kode_admin_hubin';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'created_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
