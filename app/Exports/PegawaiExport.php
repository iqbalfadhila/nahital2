<?php

namespace App\Exports;

use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PegawaiExport implements FromCollection, WithHeadings
{
    protected $nip;

    public function __construct($nip)
    {
        $this->nip = $nip;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pegawai = Pegawai::where('nip', $this->nip)->first();

        $detail_pegawai = [
            'id' => 1,
            'NIP' => $pegawai->nip,
            'nama' => $pegawai->nama,
            'alamat' => $pegawai->alamat,
            'tanggal_lahir' => $pegawai->tanggal_lahir,
            'divisi' => $pegawai->divisi->nama_divisi,
        ];

        return new Collection([$detail_pegawai]);
    }

    public function headings(): array
    {
        return [
            'Id',
            'NIP',
            'Nama',
            'Alamat',
            'Tanggal Lahir',
            'Divisi',
        ];
    }
}
