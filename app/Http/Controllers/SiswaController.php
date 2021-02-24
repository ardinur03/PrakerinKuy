<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->SiswaModel = new Siswa();
    }

    public function index()  
    {
        $data = array(
            'title' => 'Dashboarrd | Siswa',
            'contentHeader' => true,
            // 'siswa' => $this->SiswaModel->getData(),
        );
        return view('rolesViews/siswa/index_siswa', $data);
    }
}
