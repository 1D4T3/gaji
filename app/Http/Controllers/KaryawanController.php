<?php

namespace App\Http\Controllers;

use App\Models\jabatan_karyawan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masterdata.karyawan.index');
    }

    public function getKaryawan(Request $request)
{
    if ($request->ajax()) {
        $karyawan = Karyawan::all();
        return DataTables::of($karyawan)
            ->editColumn('aksi', function ($karyawan) {
                return view('partials._action', [
                    'model' => $karyawan,
                    'form_url' => route('karyawan.destroy', $karyawan->id),
                    'edit_url' => route('karyawan.edit', $karyawan->id),
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
        return view('masterdata.karyawan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'nik'           => 'required',
        'nama_lengkap'  => 'required',
        'handphone'     => 'required',
        'email'         => 'required',
        'tanggal_masuk' => 'required',
        'pengguna_id'   => 'required',
    ]);

    // insert data ke database
    Karyawan::create($request->all());

    Alert::success('Sukses', 'Berhasil Menambahkan Karyawan Baru');
    return redirect()->route('karyawan.index');
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
    public function edit(Karyawan $karyawan)
    {
        return view('masterdata.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'nik'           => 'required',
        'nama_lengkap'  => 'required',
        'handphone'     => 'required',
        'email'         => 'required',
        'tanggal_masuk' => 'required',
        'pengguna_id'   => 'required',
    ]);

    // insert data ke database
    $karyawan->update($request->all());

    Alert::success('Sukses', 'Berhasil Mengupdate Karyawan ');
    return redirect()->route('karyawan.index');
    }

    public function printPdf()
{
    $karyawan = Karyawan::all();

    $pdf = PDF::loadView('masterdata.karyawan._pdf', compact('karyawan'));
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data Gaji.pdf');
}

    public function exportExcel()
{
    $karyawan = Karyawan::all();

    return view('masterdata.karyawan._excel', compact('karyawan'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->destroy($karyawan->id);
    Alert::success('Sukses', 'Berhasil Menghapus Karyawan ');
    return redirect()->route('karyawan.index');
    }

    public function JabatanKaryawan()
{

    return $this->hasMany(jabatan_karyawan::class, 'karyawan_id');
}

}
