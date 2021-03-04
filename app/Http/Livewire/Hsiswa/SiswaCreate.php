<?php

namespace App\Http\Livewire\Hsiswa;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\{Siswa, Jurusan};

class SiswaCreate extends Component
{

  public $jurusan;

  public $jurusan_id;
  public $nis;
  public $nama_siswa;
  public $kelas;
  public $alamat;
  public $kontak_siswa;
  public $angkatan;
  public $jk_siswa;

  protected $rules = [
    'nis'         => 'required|unique:siswa',
    'jurusan_id'  => 'required',
    'nama_siswa'  => 'required',
    'kelas'       => 'required',
    'alamat'      => 'required',
    'kontak_siswa' => 'required',
    'angkatan' => 'required',
    'jk_siswa' => 'required',
  ];

  protected $messages = [
    'jurusan_id.required' => 'Jurusan tidak boleh kosong !!!',
    'nis.required'        => 'NIS tidak boleh kosong !!!',
    'nis.unique'          => 'NIS sudah terdaftar !!!',
    'nama_siswa.required' => 'Nama tidak boleh kosong !!!',
    'kelas.required'      => 'Kelas tidak boleh kosong !!!',
    'alamat.required'     => 'Alamat tidak boleh kosong !!!',
    'kontak_siswa.required' => 'kontak tidak boleh kosong !!!',
    'angkatan.required' => 'Angkatan tidak boleh kosong !!!',
    'jk_siswa.required' => 'Jeis kelamin tidak boleh kosong !!!',
  ];

  public function __construct()
  {
    $this->JurusanModel = new Jurusan();
  }

  // metod ini otomatis di jalankan
  public function mount()
  {
    //panggil metod 
    $this->initializedProperties();
  }

  public function render()
  {
    return view('livewire.hubin.siswa.siswa-create', [
      'jurusanlist' => $this->JurusanModel->getDataJurusan()
    ]);
  }


  //proses simpan
  public function store()
  {
    // panggil validasi
    $this->validate();

    try {

      //proses simpan ke database
      $siswa = Siswa::create([
        'nis'         => $this->nis,
        'jurusan_id'  => $this->jurusan_id,
        'nama_siswa'  => $this->nama_siswa,
        'kelas'       => $this->kelas,
        'alamat'      => $this->alamat,
        'kontak_siswa' => $this->kontak_siswa,
        'angkatan' => $this->angkatan,
        'jk_siswa' => $this->jk_siswa,
      ]);

      //untuk menutup POP-UP atau MODAL saat insert
      $this->dispatchBrowserEvent('closeModal');

      // untuk refresh
      $this->emit('siswaStore', $siswa);

      //untuk menkosongkan form saat isert selesai
      $this->initializedProperties();
    } catch (\Throwable $th) {
      DB::rollback();
      dd('Ops..', $th->getMessage());
    }
    DB::commit();
  }

  public function initializedProperties()
  {
    $this->jurusan = null;
    $this->nis     = null;
    $this->nama_siswa = null;
    $this->kelas  = null;
    $this->alamat = null;
    $this->kontak_siswa = null;
    $this->angkatan = null;
    $this->jk_siswa = null;
  }

  public function showConfirmation()
  {
    $this->emit("swal:confirm", [
      'type'        => 'warning',
      'title'       => 'Are you sure?',
      'text'        => "You won't be able to revert this!",
      'confirmText' => `Yes, delete!`,
      'method'      => 'appointments:delete',
      'params'      => [], // optional, send params to success confirmation
      'callback'    => '', // optional, fire event if no confirmed
    ]);
  }

  public function suksesAlert()
  {
    $this->emit('swal:modal', [
      'type'  => 'success',
      'icon'  => 'success',
      'title' => 'Success!!',
      'text'  => "Siswa berhasil di tambahkan",
    ]);
  }
}
