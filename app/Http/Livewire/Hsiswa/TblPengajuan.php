<?php

namespace App\Http\Livewire\Hsiswa;

use App\Models\PengajuanSiswa;
use Livewire\Component;

class TblPengajuan extends Component
{

    public $readyToLoad = false;

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function __construct()
    {
        $this->pengajuanModel = new PengajuanSiswa();
    }

    public function render()
    {
        $data = array(
            'title' => 'Pengajuan Tempat Prakerin',
            'pengajuan' => $this->readyToLoad ? $this->pengajuanModel->getDataPengajuan() : [],
        );
        return view('livewire.hsiswa.tbl-pengajuan', $data)->extends('layouts.After_Login.app_backend', $data)
            ->section('content', $data);;
    }
}
