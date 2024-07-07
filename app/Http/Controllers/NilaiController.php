<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Makul;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get nilais
        $nilais = Nilai::latest()->paginate(5);

        //render view with nilais
        return view('nilais.index', compact('nilais'));
    }

    /**
     * Menampilkan form untuk membuat nilai baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get makuls
        $makuls = Makul::all();

        //get mahasiswas
        $mahasiswas = Mahasiswa::all();

        //render view
        return view('nilais.create', compact('makuls', 'mahasiswas'));
    }

    /**
     * Menyimpan data nilai baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi form
        $this->validate($request, [
            'makul_id'       => 'required',
            'mahasiswa_id'   => 'required',
            'nilai'          => 'required',
        ]);

        // Membuat nilai baru
        Nilai::create([
            'makul_id'     => $request->makul_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'nilai'        => $request->nilai,
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('nilais.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show(Nilai $nilai)
    {
        return view('nilais.show', compact('nilai'));
    }

    /**
     * edit
     *
     * @param  mixed $nilai
     * @return void
     */
    public function edit(Nilai $nilai)
    {
        return view('nilais.edit', compact('nilai'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, Nilai $nilai)
    {
        // Validasi form
        $this->validate($request, [
            'makul_id'       => 'required',
            'mahasiswa_id'   => 'required',
            'nilai'          => 'required',
        ]);

        // update nilai
        $nilai->update([
            'makul_id'     => $request->makul_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'nilai'        => $request->nilai,
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('nilais.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    
    /**
     * destroy
     *
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        // Hapus data mahasiswa berdasarkan $makul yang diberikan
        $nilai->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('nilais.index')
                        ->with('success', 'Data Makul berhasil dihapus');
    }
}
