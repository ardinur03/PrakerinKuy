<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExportExcel implements FromCollection, WithHeadings
{

    public function __construct()
    {
        $this->SiswaModel = new Siswa();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $dataSiswa = $this->SiswaModel->getDataSiswaExcel();
        return $dataSiswa;
    }

    public function headings(): array
    {
        return [
            "NIS",
            "Nama Siswa",
            "Kelas",
            "Jurusan",
            "Jenis Kelamin",
            "Alamat",
            "Kontak Siswa",
            "Angkatan",
        ];
    }
}
