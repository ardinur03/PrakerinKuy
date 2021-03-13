<?php

namespace App\Http\Livewire\Hsiswa;

use Livewire\Component;

class PdfSiswa extends Component
{

    public $siswaExcel;

    public function mount($siswaExcel)
    {
        if ($siswaExcel != null) {
            $this->siswaExcel = $siswaExcel;
        } else {
            $this->siswaExcel;
        }
    }

    public function render()
    {
        return view('livewire.hsiswa.pdf-siswa');
    }
}
