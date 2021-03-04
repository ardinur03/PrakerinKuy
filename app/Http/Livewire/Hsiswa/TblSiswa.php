<?php

namespace App\Http\Livewire\Hsiswa;

use Livewire\Component;

use App\Models\Siswa;
use App\Models\Jurusan;

class TblSiswa extends Component
{
    public function __construct()
    {
        $this->SiswaModel = new Siswa();
        $this->JurusanModel = new Jurusan();
    }

    protected $listeners = [
        'reloadTblSiswa' => '$refresh',
        'siswaStore'     => 'handleSiswaCreate'
    ];

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

    public function handleSiswaCreate($siswa)
    {

        //panggil sweetalert sukses
        $this->emit('alert-success', [
            'type'  => 'success',
            'icon'  => 'success',
            'title' => 'Success!!',
            'text'  => 'Siswa ' . '<b>' . $siswa['nama_siswa'] . '</b>' . ' berhasil di tambahkan',
        ]);
    }
}
