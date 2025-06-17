<?php

namespace App\Http\Controllers;

use App\Models\jabatan_karyawan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Session;

class jabatan_karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('masterdata.jabatan_karyawan.index');
        $jabatan_karyawan = jabatan_karyawan::with(['jabatan','karyawan'])->orderBy('tanggal_mulai','desc')->get();

        return view('masterdata.jabatan_karyawan.index', ['jabatan_karyawan' => $jabatan_karyawan]);
    }

    public function getjabatan_karyawan(Request $request)
{
    if ($request->ajax()) {
        $jabatan_karyawan = jabatan_karyawan::all();
        return DataTables::of($jabatan_karyawan)
            ->editColumn('aksi', function ($jabatan_karyawan) {
                return view('partials._action', [
                    'model' => $jabatan_karyawan,
                    'form_url' => route('jabatan_karyawan.destroy', $jabatan_karyawan->id),
                    'edit_url' => route('jabatan_karyawan.edit', $jabatan_karyawan->id),
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
        return view('masterdata.jabatan_karyawan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'jabatan_id'       => 'required',
        'karyawan_id'      => 'required',
        'tanggal_mulai'      => 'required'

    ]);

    // insert data ke database
    jabatan_karyawan::create($request->all());

    Alert::success('Sukses', 'Berhasil Menambahkan Jabatan Baru');
    return redirect()->route('jabatan_karyawan.index');
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
    public function edit(jabatan_karyawan $jabatan_karyawan)
    {
        return view('masterdata.jabatan_karyawan.edit', compact('jabatan_karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jabatan_karyawan $jabatan_karyawan)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'jabatan_id'        => 'required',
        'karyawan_id'        => 'required',
        'tanggal_mulai'        => 'required',
    ]);

    // insert data ke database
    $jabatan_karyawan->update($request->all());

    Alert::success('Sukses', 'Berhasil Mengupdate Jabatan ');
    return redirect()->route('jabatan_karyawan.index');
    }

    public function printPdf()
{
    $jabatan_karyawan = jabatan_karyawan::all();

    $pdf = PDF::loadView('masterdata.jabatan_karyawan._pdf', compact('jabatan_karyawan'));
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data Gaji.pdf');
}
    public function exportExcel()
{
    $jabatan_karyawan = jabatan_karyawan::all();

    return view('masterdata.jabatan_karyawan._excel', compact('jabatan_karyawan'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jabatan_karyawan $jabatan_karyawan)
    {
        $jabatan_karyawan->destroy($jabatan_karyawan->id);
    Alert::success('Sukses', 'Berhasil Menghapus Jabatan ');
    return redirect()->route('jabatan_karyawan.index');
    }
}
