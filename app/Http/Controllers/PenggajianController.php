<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Session;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('masterdata.penggajian.index');
        $penggajian = Penggajian::with(['karyawan'])->orderBy('karyawan_id','asc')->get();

        return view('masterdata.penggajian.index', ['penggajian' => $penggajian]);
    }

    public function getPenggajian(Request $request)
{
    if ($request->ajax()) {
        $penggajian = Penggajian::all();
        return DataTables::of($penggajian)
            ->editColumn('aksi', function ($penggajian) {
                return view('partials._action', [
                    'model' => $penggajian,
                    'form_url' => route('penggajian.destroy', $penggajian->id),
                    'edit_url' => route('penggajian.edit', $penggajian->id),
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
        return view('masterdata.penggajian.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'karyawan_id'   => 'required',
        'tahun'         => 'required',
        'bulan'         => 'required',
        'gapok'         => 'required',
        'tunjangan'     => 'required',
        'uang_makan'    => 'required'

    ]);

    // insert data ke database
    Penggajian::create($request->all());

    Alert::success('Sukses', 'Berhasil Menambahkan Penggajian Baru');
    return redirect()->route('penggajian.index');
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
    public function edit(Penggajian $penggajian)
    {

        return view('masterdata.penggajian.edit', compact('penggajian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penggajian $penggajian)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'karyawan_id'   => 'required',
        'tahun'         => 'required',
        'bulan'         => 'required',
        'gapok'         => 'required',
        'tunjangan'     => 'required',
        'uang_makan'    => 'required',
    ]);

    // insert data ke database
    $penggajian->update($request->all());

    Alert::success('Sukses', 'Berhasil Mengupdate Penggajian ');
    return redirect()->route('penggajian.index');
    }

    public function printPdf()
{
    $penggajian = Penggajian::all();

    $pdf = PDF::loadView('masterdata.penggajian._pdf', compact('penggajian'));
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data Gaji.pdf');
}
    public function exportExcel()
{
    $penggajian = Penggajian::all();

    return view('masterdata.penggajian._excel', compact('penggajian'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penggajian $penggajian)
    {
        $penggajian->destroy($penggajian->id);
    Alert::success('Sukses', 'Berhasil Menghapus Jabatan ');
    return redirect()->route('penggajian.index');
    }
}
