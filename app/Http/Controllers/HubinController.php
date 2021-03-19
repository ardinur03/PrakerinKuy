<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\PengajuanSiswa;
use App\Models\Perusahaan;
use App\Models\Roles;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HubinController extends Controller
{

    public function __construct()
    {
        $this->UserModel  = new User();
        $this->SiswaModel = new Siswa();
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard | Hubin Admin',
            // 'contentHeader' => false,
            'perusahaanCount' => Perusahaan::get()->Count(),
            'siswaCount' => Siswa::get()->Count(),
            'jurusanCount' => Jurusan::get()->Count(),
            'getDataAdminHubin' => $this->UserModel->getDataAdminHubin(Auth::user()->id),
        );
        return view('rolesViews/hubin/index_hubin', $data);
    }

    public function printPdfPerusahaan()
    {
        $data = array(
            'title' => 'Print PDF data Perusahaan',

            // menggunakan model dari laravel 
            // 'perusahaan' => Perusahaan::latest()->get()

            // Menggunakan store Prosedure tanpa parameter dengan nama "getAllPerusahaanExcel"
            'perusahaan' => DB::select('call getAllPerusahaanExcel')
        );
        return view('rolesViews.hubin.master.perusahaan.print-pdf', $data);
    }

    public function printPdfSiswa()
    {
        $data = array(
            'title' => 'Print PDF data Siswa',
            'siswaExcel' => $this->SiswaModel->getDataSiswaExcel(),
        );
        return view('rolesViews.hubin.master.siswa.print-pdf-siswa', $data);
    }

    public function galeriPerus()
    {
        $data = array(
            'title' => 'Galeri Perusahaan'
        );
        return view('rolesViews.hubin.master.perusahaan.galeri-perusahaan', $data);
    }
}
