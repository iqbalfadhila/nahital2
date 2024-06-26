<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_divisi' => 'S1', 'nama_divisi' => 'Gudang', 'pimpinan_divisi' => 'Beni Permana, SE'],
            ['kode_divisi' => 'S2', 'nama_divisi' => 'Produksi', 'pimpinan_divisi' => 'Syaiful Bachri,ST'],
            ['kode_divisi' => 'S3', 'nama_divisi' => 'HRD', 'pimpinan_divisi' => 'Dr. Anggit Darmawan'],
        ];

        DB::table('divisi')->insert($data);
    }
}
