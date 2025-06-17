<?php

namespace App\Http\Controllers;

use App\Models\bagian_karyawan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Session;
class bagian_karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bagian_karyawan = bagian_karyawan::with(['bagian','karyawan'])->orderBy('tanggal_mulai','desc')->get();

        return view('masterdata.bagian_karyawan.index', ['bagian_karyawan' => $bagian_karyawan]);
    }

    public function getbagian_karyawan(Request $request)
{
    if ($request->ajax()) {
        if ($request->ajax()) {
        // DIUBAH: Gunakan with() untuk Eager Loading relasi
        $data = bagian_karyawan::with(['bagian', 'karyawan']);

        return DataTables::of($data)
            ->addIndexColumn()
            // DITAMBAHKAN: Kolom untuk menampilkan nama karyawan
            ->addColumn('nama_bagian', function ($bagian_karyawan) {
                // Gunakan optional() atau null safe operator (?->) agar tidak error jika relasi kosong
                return $bagian_karyawan->bagian->nama_bagian ?? 'N/A';
            })
            // DITAMBAHKAN: Kolom untuk menampilkan nama lokasi
            ->addColumn('nama_karyawan', function ($bagian_karyawan) {
                return $bagian_karyawan->karyawan->nama_karyawan ?? 'N/A';
            })
            ->editColumn('aksi', function ($bagian_karyawan) {
                return view('partials._action', [
                    'model' => $bagian_karyawan,
                    'form_url' => route('bagian_karyawan.destroy', $bagian_karyawan->id),
                    'edit_url' => route('bagian_karyawan.edit', $bagian_karyawan->id),
                ]);
            })
            // DITAMBAHKAN: 'aksi' harus tetap di rawColumns jika mengandung HTML
            ->rawColumns(['aksi'])
            ->make(true);
    }
    }
}
//     public function getbagian_karyawan(Request $request)
// {
//     if ($request->ajax()) {
//         $bagian_karyawan = bagian_karyawan::all();
//         return DataTables::of($bagian_karyawan)
//             ->editColumn('aksi', function ($bagian_karyawan) {
//                 return view('partials._action', [
//                     'model' => $bagian_karyawan,
//                     'form_url' => route('bagian_karyawan.destroy', $bagian_karyawan->id),
//                     'edit_url' => route('bagian_karyawan.edit', $bagian_karyawan->id),
//                 ]);
//             })
//             ->addIndexColumn()
//             ->rawColumns(['aksi'])
//             ->make(true);
//     }
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masterdata.bagian_karyawan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'bagian_id'       => 'required',
        'karyawan_id'      => 'required',
        'tanggal_mulai'      => 'required'

    ]);

    // insert data ke database
    bagian_karyawan::create($request->all());

    Alert::success('Sukses', 'Berhasil Menambahkan Jabatan Baru');
    return redirect()->route('bagian_karyawan.index');
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
    public function edit(bagian_karyawan $bagian_karyawan)
    {
        return view('masterdata.bagian_karyawan.edit', compact('bagian_karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bagian_karyawan $bagian_karyawan)
    {
        // memvalidasi inputan
    $this->validate($request, [
        'bagian_id'        => 'required',
        'karyawan_id'        => 'required',
        'tanggal_mulai'        => 'required',
    ]);

    // insert data ke database
    $bagian_karyawan->update($request->all());

    Alert::success('Sukses', 'Berhasil Mengupdate Jabatan ');
    return redirect()->route('bagian_karyawan.index');
    }

    public function printPdf()
{
    $bagian_karyawan = bagian_karyawan::all();

    $pdf = PDF::loadView('masterdata.bagian_karyawan._pdf', compact('bagian_karyawan'));
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data Gaji.pdf');
}
    public function exportExcel()
{
    $bagian_karyawan = bagian_karyawan::all();

    return view('masterdata.bagian_karyawan._excel', compact('bagian_karyawan'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bagian_karyawan $bagian_karyawan)
    {
        $bagian_karyawan->destroy($bagian_karyawan->id);
    Alert::success('Sukses', 'Berhasil Menghapus Jabatan ');
    return redirect()->route('bagian_karyawan.index');
    }
}
