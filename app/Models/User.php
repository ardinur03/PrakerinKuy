<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDataUser($id)
    {
        return DB::table('users')->join('siswa', 'users.id', '=', 'siswa.user_id')
            ->join('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
            ->where('users.id', $id)
            ->get();
    }

    public function getDataAdminHubin($id)
    {
        return DB::table('users')->leftJoin('admin_hubin', 'users.id', '=', 'admin_hubin.user_id')
            ->where('users.id', $id)
            ->get();
    }
}
