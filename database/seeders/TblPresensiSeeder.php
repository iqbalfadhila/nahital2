<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblPresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['tanggal' => '2018-01-02', 'nip' => 1, 'jam_masuk' => '08:10', 'jam_pulang' => '17:40'],
            ['tanggal' => '2018-01-02', 'nip' => 2, 'jam_masuk' => '08:00', 'jam_pulang' => '17:07'],
            ['tanggal' => '2018-01-02', 'nip' => 3, 'jam_masuk' => '07:00', 'jam_pulang' => '16:30'],
            ['tanggal' => '2018-01-03', 'nip' => 1, 'jam_masuk' => '07:45', 'jam_pulang' => '16:40'],
            ['tanggal' => '2018-01-03', 'nip' => 2, 'jam_masuk' => '07:50', 'jam_pulang' => '16:50'],
            ['tanggal' => '2018-01-04', 'nip' => 1, 'jam_masuk' => '07:55', 'jam_pulang' => '17:30'],
            ['tanggal' => '2018-01-05', 'nip' => 1, 'jam_masuk' => '07:20', 'jam_pulang' => '16:20'],
        ];

        DB::table('presensi')->insert($data);
    }
}
