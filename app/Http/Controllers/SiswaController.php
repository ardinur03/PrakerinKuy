<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()  
    {
        $data = array(
            'title' => 'Dashboarrd | Siswa',
            'contentHeader' => true
        );
        return view('rolesViews/siswa/index_siswa', $data);
    }
}
