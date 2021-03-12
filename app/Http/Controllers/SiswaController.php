<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->SiswaModel = new Siswa();
        $this->UserModel = new User();
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard | Siswa',
            'contentHeader' => true,
            'dataUser' => $this->UserModel->getDataUser(Auth::user()->id)
            // 'siswa' => $this->SiswaModel->getData(),
        );

        dd($data['dataUser']);

        return view('rolesViews/siswa/index_siswa', $data);
    }

    public function coba()
    {
        return view('home');
    }
}
