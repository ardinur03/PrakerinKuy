<?php

namespace App\Http\Livewire\Hperusahaan;

use App\Models\Perusahaan;
use Illuminate\Support\Facades\DB;
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
            'perusahaan' => DB::select('call getAllPerusahaanExcel'),
        );
        $this->emit('reloadTblPerusahaan');
        return view('livewire.hperusahaan.pdf-perusahaan', $data);
    }
}
