<?php

namespace App\Http\Livewire\Hsiswa;

use App\Models\Siswa;
use Livewire\Component;

class SiswaDetail extends Component
{

    public $jurusan_id;

    // public $id;
    public $nis;
    public $nama_siswa;
    public $kelas;
    public $nama_jurusan; // => dari tabel jurusan
    public $alamat;
    public $kontak_siswa;
    public $angkatan;
    public $jk_siswa;

    protected $listeners = [
        'detailSiswa' => 'showModalDetail'
    ];


    public function render()
    {
        return view('livewire.hubin.siswa.siswa-detail');
    }

    public function __construct()
    {
        $this->SiswaModel = new Siswa();
    }

    public function showModalDetail(Siswa $siswa)
    {
        $this->nis  = $siswa->nis;
        $siswa = $this->SiswaModel->leftjoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
            ->select('siswa.*', 'jurusan.nama_jurusan')->find($this->nis);
        $this->nis = $siswa->nis;
        $this->nama_siswa   = $siswa->nama_siswa;
        $this->kelas        = $siswa->kelas;
        $this->nama_jurusan = $siswa->nama_jurusan;
        $this->alamat       = $siswa->alamat;
        $this->kontak_siswa = $siswa->kontak_siswa;
        $this->angkatan = $siswa->angkatan;
        $this->jk_siswa = $siswa->jk_siswa;

        $this->dispatchBrowserEvent('openModalDetail', 'modal_detail_siswa');
    }
}
