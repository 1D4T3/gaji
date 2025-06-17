<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Session;
class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presensi = Presensi::with(['karyawan'])->orderBy('karyawan_id')->get();

        return view('masterdata.presensi.index', ['presensi' => $presensi]);
    }

    public function getPresensi(Request $request)
{
    if ($request->ajax()) {
        $presensi = Presensi::all();
        return DataTables::of($presensi)
            ->editColumn('aksi', function ($presensi) {
                return view('partials._action', [
                    'model' => $presensi,
                    'form_url' => route('presensi.destroy', $presensi->id),
                    'edit_url' => route('presensi.edit', $presensi->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masterdata.presensi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'karyawan_id'   => 'required',
        'tanggal'       => 'required',
        'jam_masuk'     => 'required',
        'jam_keluar'    => 'required',
        'keterangan'    => 'required'

    ]);

    // insert data ke database
    Presensi::create($request->all());

    Alert::success('Sukses', 'Berhasil Menambahkan Presensi Baru');
    return redirect()->route('presensi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presensi $presensi)
    {
        return view('masterdata.presensi.edit', compact('presensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presensi $presensi)
    {
        // memvalidasi inputan
        $this->validate($request, [
            'karyawan_id'   => 'required',
            'tanggal'       => 'required',
            'jam_masuk'     => 'required',
            'jam_keluar'    => 'required',
            'keterangan'    => 'required'
        ]);

        // update data ke database
        $presensi->update($request->all());

        Alert::success('Sukses', 'Berhasil Mengupdate Presensi');
        return redirect()->route('presensi.index');
    }

    public function printPdf()
{
    $presensi = Presensi::all();

    $pdf = PDF::loadView('masterdata.presensi._pdf', compact('presensi'));
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data Gaji.pdf');
}
    public function exportExcel()
{
    $presensi = Presensi::all();

    return view('masterdata.presensi._excel', compact('presensi'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presensi $presensi)
    {
        $presensi->destroy($presensi->id);
    Alert::success('Sukses', 'Berhasil Menghapus Presensi ');
    return redirect()->route('presensi.index');
    }
}
