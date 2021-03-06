<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImportFile implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row['nis'],
            'nama_siswa' => $row['nama_siswa'],
            'kelas' => $row['kelas'],
            'jk_siswa' => $row['jenis_kelamin'],
            'jurusan_id' => $row['jurusan'],
            'kontak_siswa' => $row['kontak'],
            'alamat' => $row['alamat'],
            'angkatan' => $row['angkatan'],
        ]);
    }
}
