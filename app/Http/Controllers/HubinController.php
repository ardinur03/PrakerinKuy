<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class HubinController extends Controller
{

    public function __construct()
    {
        $this->UserModel = new User();
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard | Hubin Admin',
            // 'contentHeader' => false,
            'perusahaanCount' => Perusahaan::get()->Count(),
            'siswaCount' => Siswa::get()->Count(),
            'jurusanCount' => Jurusan::get()->Count(),
            'getDataAdminHubin' => $this->UserModel->getDataAdminHubin(Auth::user()->id)
        );
        return view('rolesViews/hubin/index_hubin', $data);
    }

    public function printPdfPerusahaan()
    {
        $data = array(
            'perusahaan' => Perusahaan::latest()->get()
        );
        return view('rolesViews.hubin.master.perusahaan.print-pdf', $data);
    }

    public function galeriPerus()
    {
        $data = array(
            'title' => 'Galeri Perusahaan'
        );
        return view('rolesViews.hubin.master.perusahaan.galeri-perusahaan', $data);
    }
}
