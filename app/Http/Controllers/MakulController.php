<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get makuls
        $makuls = Makul::latest()->paginate(5);

        //render view with makuls
        return view('makuls.index', compact('makuls'));
    }

    /**
     * Menampilkan form untuk membuat makul baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makuls.create');
    }

    /**
     * Menyimpan data makul baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi form
        $this->validate($request, [
            'kd_makul'     => 'required|max:255',
            'nama_makul'   => 'required|max:255',
            'sks'          => 'required|integer',
        ]);

        // Membuat makul baru
        Makul::create([
            'kd_makul'   => $request->kd_makul,
            'nama_makul' => $request->nama_makul,
            'sks'        => $request->sks,
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('makuls.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //get makul by ID
        $makul = Makul::find($id);

        //return view
        return view('makuls.show', compact('makul'));
    }

    /**
     * edit
     *
     * @param  mixed $makul
     * @return void
     */
    public function edit(Makul $makul)
    {
        return view('makuls.edit', compact('makul'));
    }

    /**
     * update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Makul $makul)
    {
        // validate form
        $this->validate($request, [
            'kd_makul'   => 'required|max:255',
            'nama_makul' => 'required|max:255',
            'sks'        => 'required|integer|min:1',
        ]);

        // update makul
        $makul->update([
            'kd_makul'   => $request->kd_makul,
            'nama_makul' => $request->nama_makul,
            'sks'        => $request->sks,
        ]);

        // redirect to index with success message
        return redirect()->route('makuls.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * destroy
     *
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makul $makul)
    {
        // Hapus data mahasiswa berdasarkan $makul yang diberikan
        $makul->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('makuls.index')
                        ->with('success', 'Data Makul berhasil dihapus');
    }

}
