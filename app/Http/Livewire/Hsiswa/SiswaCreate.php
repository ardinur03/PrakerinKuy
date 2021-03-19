<?php

namespace App\Http\Livewire\Hsiswa;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\{Siswa, Jurusan};
use Illuminate\Support\Facades\Auth;

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
  public $email_siswa;

  public $id_user;


  protected $rules = [
    'nis'         => 'required|unique:siswa|min:10|max:11',
    'jurusan_id'  => 'required',
    'nama_siswa'  => 'required',
    'kelas'       => 'required',
    'alamat'      => 'required',
    'kontak_siswa' => 'required|max:13',
    'email_siswa' => 'required|email|unique:siswa',
    'angkatan' => 'required',
    'jk_siswa' => 'required',
  ];

  protected $messages = [
    'jurusan_id.required' => 'Jurusan tidak boleh kosong !!!',
    'nis.required'        => 'NIS tidak boleh kosong !!!',
    'nis.unique'          => 'NIS sudah terdaftar !!!',
    'nis.min'          => 'NIS minimal 10 angka !!!',
    'nis.max'          => 'NIS maximal 11 angka !!!',
    'nama_siswa.required' => 'Nama tidak boleh kosong !!!',
    'kelas.required'      => 'Kelas tidak boleh kosong !!!',
    'alamat.required'     => 'Alamat tidak boleh kosong !!!',
    'kontak_siswa.required' => 'kontak tidak boleh kosong !!!',
    'kontak_siswa.max' => 'Kontak Maximal 13 nomor !!!',
    'email_siswa.required' => 'Email tidak boleh kosong !!!',
    'email_siswa.unique' => 'Email sudah terdaftar !!!',
    'email_siswa.email' => 'Format yang anda masukan bukan Email !!!',
    'angkatan.required' => 'Angkatan tidak boleh kosong !!!',
    'jk_siswa.required' => 'Jeis kelamin tidak boleh kosong !!!',
  ];

  public function __construct()
  {
    $this->JurusanModel = new Jurusan();
  }

  // validasi real time
  public function updated($property, $value)
  {
    if (trim($value)) {
      $this->validateOnly($property);
    } else {
      $this->resetErrorBag($property);
    }
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

    $kontakSiswa = '+62' . $this->kontak_siswa;
    try {
      //proses simpan ke database
      $siswa = Siswa::create([
        'nis'         => $this->nis,
        'jurusan_id'  => $this->jurusan_id,
        'nama_siswa'  => $this->nama_siswa,
        'kelas'       => $this->kelas,
        'alamat'      => $this->alamat,
        'kontak_siswa' => $kontakSiswa,
        'email_siswa' => $this->email_siswa,
        'angkatan' => $this->angkatan,
        'jk_siswa' => $this->jk_siswa,
        'created_by' => Auth::user()->id,
      ]);

      //untuk menutup POP-UP atau MODAL saat insert
      $this->dispatchBrowserEvent('closeModal');

      // untuk refresh
      $this->emit('reloadTblSiswa');

      //memanggil alert sukses
      $this->emit('siswaStoreSuccess', $siswa);

      //untuk menkosongkan form saat isert selesai
      $this->initializedProperties();
    } catch (\Throwable $th) {
      DB::rollback();
      // dd('Ops..', $th->getMessage());
      $this->emit('siswaStoreFail', $th->getMessage());
    }
    DB::commit();
  }

  public function cancel()
  {
    $this->initializedProperties();
  }

  public function initializedProperties()
  {
    $this->resetErrorBag();
    $this->jurusan = null;
    $this->nis     = null;
    $this->nama_siswa = null;
    $this->kelas  = null;
    $this->alamat = null;
    $this->kontak_siswa = null;
    $this->angkatan = null;
    $this->jk_siswa = null;
    $this->email_siswa = null;
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
}
