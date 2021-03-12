<?php

namespace App\Exports;

use App\Models\Perusahaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class PerusahaanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Perusahaan::all();
    }

    public function headings(): array
    {
        return [
            "Kode Perusahaan",
            "Nama Perusahaan",
            "Pimpinan Perusahaan",
            "Email Perusahaan",
            "Website Perusahaan",
            "Kontak Perusahaan",
            "Jenis Perusahaan",
            "Alamat Perusahaan",
            "Kota Perusahaan",
            "Kode POS Perusahaan",
            "Created at",
            "Updated at",
        ];
    }
}
