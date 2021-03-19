<?php

namespace App\Http\Livewire\Siswa;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexSiswaProfile extends Component
{
    public $jurusan_id;
    public $nis;
    public $nama_siswa;
    public $kelas;
    public $alamat;
    public $kontak_siswa;
    public $angkatan;
    public $jk_siswa;

    public function __construct()
    {
        $this->UserModel = new User();
    }

    public function mount()
    {
        $this->id_user = Auth::user()->id;
        $siswa = $this->UserModel->getDataUser($this->id_user);
        // $siswa = User::find($this->id_user);
        dd($siswa[0]->nis);
        $this->jurusan_id = $siswa[0]->jurusan_id;
        $this->nis  = $siswa[0]->nis;
        $this->nama_siswa = $siswa[0]->nama_siswa;
        $this->kelas  = $siswa[0]->kelas;
        $this->alamat = $siswa[0]->alamat;
        $this->kontak_siswa = $siswa[0]->kontak_siswa;
        $this->angkatan = $siswa[0]->angkatan;
        $this->jk_siswa = $siswa[0]->jk_siswa;
    }

    public function render()
    {
        return view('livewire.siswa.index-siswa-profile');
    }
}
