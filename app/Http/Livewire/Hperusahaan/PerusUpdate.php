<?php

namespace App\Http\Livewire\Hperusahaan;

use App\Models\Perusahaan;
use Livewire\Component;

class PerusUpdate extends Component
{
    public $kode_perusahaan;
    public $nama_perusahaan;
    public $pimpinan_perusahaan;
    public $email_perusahaan;
    public $website_perusahaan;
    public $kontak_perusahaan;
    public $jenis_perusahaan;
    public $alamat_perusahaan;
    public $kota_perusahaan;
    public $kode_pos;

    protected $listeners = [
        'updatePerusahaan' => 'showModalPerusahaan'
    ];

    public function render()
    {
        return view('livewire.hperusahaan.perus-update');
    }

    public function showModalPerusahaan(Perusahaan $perusahaan)
    {
        $this->kode_perusahaan = $perusahaan->kode_perusahaan;
        $this->nama_perusahaan = $perusahaan->nama_perusahaan;
        $this->pimpinan_perusahaan  = $perusahaan->pimpinan_perusahaan;
        $this->email_perusahaan     = $perusahaan->email_perusahaan;
        $this->website_perusahaan   = $perusahaan->website_perusahaan;
        $this->kontak_perusahaan    = $perusahaan->kontak_perusahaan;
        $this->jenis_perusahaan     = $perusahaan->jenis_perusahaan;
        $this->alamat_perusahaan    = $perusahaan->alamat_perusahaan;
        $this->kota_perusahaan = $perusahaan->kota_perusahaan;
        $this->kode_pos        = $perusahaan->kode_pos;

        $this->dispatchBrowserEvent('openModal', 'modal_update_perusahaan');
    }

    public function cancel()
    {
        $this->initialisasiModalPerus();
    }

    public function initialisasiModalPerus()
    {
        $this->kode_perusahaan = null;
        $this->kode_jurusan = null;
        $this->nama_perusahaan = null;
        $this->pimpinan_perusahaan = null;
        $this->email_perusahaan = null;
        $this->website_perusahaan = null;
        $this->kontak_perusahaan = null;
        $this->jenis_perusahaan = null;
        $this->alamat_perusahaan = null;
        $this->kota_perusahaan = null;
        $this->kode_pos = null;
    }
}
