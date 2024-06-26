<?php

namespace App\Http\Controllers;

use App\Exports\PegawaiExport;
use App\Models\Pegawai;
use App\Models\Presensi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        // dd($pegawai);
        // 1. presensi
        // $pegawaiPresensi = Presensi::select('nip', DB::raw('COUNT(*) as jumlah_presensi'))
        // ->whereYear('tanggal', 2018)
        // ->whereMonth('tanggal', 1)
        // ->groupBy('nip')
        // ->get();

        // dd($pegawaiPresensi);

        // 2. pegawai per divisi
        // $jumlahPegawaiPerDivisi = Pegawai::select('kode_divisi', DB::raw('COUNT(*) as jumlah_pegawai'))
        // ->groupBy('kode_divisi')
        // ->get();
        // dd($jumlahPegawaiPerDivisi);

        // 3. berdasarkan alamat
        // $pegawaiBogor = Pegawai::where('alamat', 'LIKE', '%Bogor%')->get();
        // dd($pegawaiBogor);

        return view('pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $nip)
    {
        // dd($nip);
        // $pegawai = Pegawai::find($nip);

        // return view('pegawaidetail', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function detail(Request $request)
    {
        $nip = $request->input('nip');
        $pegawai = Pegawai::with('divisi')->where('nip', $nip)->first();

        if (!$pegawai) {
            return response()->json(['success' => false, 'message' => 'Pegawai tidak ditemukan.'], 404);
        }

        return response()->json(['success' => true, 'pegawai' => $pegawai]);
    }

    public function exportExcel(Request $request)
    {
        $nip = $request->input('nip');
        // dd($nip);
        return Excel::download(new PegawaiExport($nip), 'pegawai.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $nip = $request->input('nip');
        $pegawai = Pegawai::where('nip', $nip)->with('divisi')->first();
        // dd($pegawai);

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Pegawai tidak ditemukan.');
        }

        $pdf = Pdf::loadView('pegawaipdf', compact('pegawai'));
        return $pdf->download('pegawai.pdf');
    }
}

// SELECT nip, COUNT(*) AS jumlah_presensi FROM presensi WHERE YEAR(tanggal) = 2018 AND MONTH(tanggal)=1 GROUP BY nip;

// SELECT kode_divisi, COUNT(*) AS jumlah_pegawai FROM pegawai GROUP BY kode_divisi;

// SELECT * FROM pegawai WHERE alamat LIKE '%BOGOR%'
