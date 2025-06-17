<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Session;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('masterdata.bagian.index');
        $bagian = Bagian::with(['karyawan','lokasi'])->orderBy('nama_bagian')->get();

        return view('masterdata.bagian.index', ['bagian' => $bagian]);
    }

    public function getBagian(Request $request)
{
    if ($request->ajax()) {
        $bagian = Bagian::all();
        return DataTables::of($bagian)
            ->editColumn('aksi', function ($bagian) {
                return view('partials._action', [
                    'model' => $bagian,
                    'form_url' => route('bagian.destroy', $bagian->id),
                    'edit_url' => route('bagian.edit', $bagian->id),
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
        return view('masterdata.bagian.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'nama_bagian'       => 'required',
        'karyawan_id'      => 'required',
        'lokasi_id'      => 'required'

    ]);

    // insert data ke database
    Bagian::create($request->all());

    Alert::success('Sukses', 'Berhasil Menambahkan Bagian Baru');
    return redirect()->route('bagian.index');
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
    public function edit(Bagian $bagian)
    {
        return view('masterdata.bagian.edit', compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bagian $bagian)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'nama_bagian'        => 'required',
        'karyawan_id'        => 'required',
        'lokasi_id'        => 'required',
    ]);

    // insert data ke database
    $bagian->update($request->all());

    Alert::success('Sukses', 'Berhasil Mengupdate Bagian ');
    return redirect()->route('bagian.index');
    }

    public function printPdf()
{
    $bagian = Bagian::all();

    $pdf = PDF::loadView('masterdata.bagian._pdf', compact('bagian'));
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data Gaji.pdf');
}
    public function exportExcel()
{
    $bagian = Bagian::all();

    return view('masterdata.bagian._excel', compact('bagian'));
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bagian $bagian)
    {
        $bagian->destroy($bagian->id);
    Alert::success('Sukses', 'Berhasil Menghapus Bagian ');
    return redirect()->route('bagian.index');
    }
}
