<?php

namespace App\Http\Livewire\Siswa;

use Livewire\Component;

use App\Models\Siswa;

class TblSiswa extends Component
{
    public function __construct() {
      $this->SiswaModel = new Siswa();
    }

    public function render()
    {
        $data = array(
            'siswa' => $this->SiswaModel->getData(),
            'title' => 'Master data | Siswa'
        );

        return view('livewire.hubin.siswa.tbl-siswa', $data)
                ->extends('layouts.After_Login.app_backend', $data)
                ->section('content');
    }

}
