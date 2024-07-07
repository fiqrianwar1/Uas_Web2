<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data mahasiswa dari database dengan pagination
        $mahasiswas = Mahasiswa::latest()->paginate(5);

        // Mengembalikan view 'mahasiswas.index' dengan data mahasiswas
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Menampilkan form untuk menambah mahasiswa baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Menyimpan data mahasiswa baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi form
        $this->validate($request, [
            'npm'               =>  'required|max:15',
            'nama'              =>  'required|max:255',
            'tempat_lahir'      =>  'required|max:255',
            'tgl_lahir'         =>  'required|date',
            'jenis_kelamin'     =>  'required|in:L,P',
            'alamat'            =>  'required|max:255',
            'telp'              =>  'required|max:15',
        ]);

        // Membuat mahasiswa baru
        Mahasiswa::create([
            'npm'           => $request->npm,
            'nama'          => $request->nama,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'telp'          => $request->telp
        ]);

        // redirect to index with success message
        return redirect()->route('mahasiswas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //get mahasiswa by ID
        $mahasiswa = Mahasiswa::find($id);

        //return view
        return view('mahasiswas.show', compact('mahasiswa'));
    }

    /**
     * edit
     *
     * @param  mixed $mahasiswa
     * @return void
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // validate form
        $this->validate($request, [
            'npm'               => 'required|max:15',
            'nama'              => 'required|max:255',
            'tempat_lahir'      => 'required|max:255',
            'tgl_lahir'         => 'required|date',
            'jenis_kelamin'     => 'required|in:L,P',
            'alamat'            => 'required|max:255',
            'telp'              => 'required|max:15',
        ]);

        // update mahasiswa
        $mahasiswa->update([
            'npm'           => $request->npm,
            'nama'          => $request->nama,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'telp'          => $request->telp
        ]);

        // redirect to index with success message
        return redirect()->route('mahasiswas.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * destroy
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // Hapus data mahasiswa berdasarkan $mahasiswa yang diberikan
        $mahasiswa->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswas.index')
                        ->with('success', 'Data Mahasiswa berhasil dihapus');
    }

}
