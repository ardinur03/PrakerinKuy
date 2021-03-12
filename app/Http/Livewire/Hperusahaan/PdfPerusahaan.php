<?php

namespace App\Http\Livewire\Hperusahaan;

use App\Models\Perusahaan;
use Livewire\Component;

class PdfPerusahaan extends Component
{

    protected $perusahaan;

    protected $listeners = [
        'reloadTblPerusahaan' => '$refresh',
    ];

    public function mount($perusahaan = null)
    {
        if ($perusahaan != null) {
            $this->perusahaan = $perusahaan;
        } else {
            $this->perusahaan;
        }
    }

    public function render()
    {
        $data = array(
            'perusahaan' => Perusahaan::latest()->get(),
        );
        $this->emit('reloadTblPerusahaan');
        return view('livewire.hperusahaan.pdf-perusahaan', $data);
    }
}
