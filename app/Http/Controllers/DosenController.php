<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data mahasiswa dari database dengan pagination
        $dosens = Dosen::latest()->paginate(5);

        // Mengembalikan view 'mahasiswas.index' dengan data mahasiswas
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Menampilkan form untuk menambah mahasiswa baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosens.create');
    }

    
    /**
     * Menyimpan data dosen baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi form
        $this->validate($request, [
            'nidn'          => 'required|max:15',
            'nama_dosen'    => 'required|max:255',
            'tempat_lahir'  => 'required|max:255',
            'tgl_lahir'     => 'required|date',
            'alamat'        => 'required|max:255',
        ]);

        // Membuat dosen baru
        Dosen::create([
            'nidn'          => $request->nidn,
            'nama_dosen'    => $request->nama_dosen,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'alamat'        => $request->alamat,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dosens.index')->with('success', 'Data Dosen berhasil disimpan.');
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //get dosen by ID
        $dosen = Dosen::find($id);

        //return view
        return view('dosens.show', compact('dosen'));
    }

    /**
     * edit
     *
     * @param  mixed $dosen
     * @return void
     */
    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', compact('dosen'));
    }

    /**
     * update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        // validate form
        $this->validate($request, [
            'nidn'          => 'required|max:15',
            'nama_dosen'    => 'required|max:255',
            'tempat_lahir'  => 'required|max:255',
            'tgl_lahir'     => 'required|date',
            'alamat'        => 'required|max:255',
        ]);

        // update dosen
        $dosen->update([
            'nidn'          => $request->nidn,
            'nama_dosen'    => $request->nama_dosen,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'alamat'        => $request->alamat,
        ]);

        // redirect to index with success message
        return redirect()->route('dosens.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * destroy
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        // Hapus data mahasiswa berdasarkan $dosen yang diberikan
        $dosen->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('dosens.index')
                        ->with('success', 'Data Dosen berhasil dihapus');
    }
}
