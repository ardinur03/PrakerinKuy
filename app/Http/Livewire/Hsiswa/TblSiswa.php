<?php

namespace App\Http\Livewire\Hsiswa;

use Livewire\Component;

use App\Models\Siswa;
use App\Models\Jurusan;

class TblSiswa extends Component
{
    public function __construct() {
      $this->SiswaModel = new Siswa();
      $this->JurusanModel = new Jurusan();
    }

    public function render()
    {
        $data = array(
            'siswa' => $this->SiswaModel->getData(),
            'title' => 'Master data | Siswa',
            'jurusan' => $this->JurusanModel->getDataJurusan()
        );

        return view('livewire.hubin.siswa.tbl-siswa', $data)
                ->extends('layouts.After_Login.app_backend', $data)
                ->section('content', $data);
    }

}
