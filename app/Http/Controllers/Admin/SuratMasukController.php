<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SuratMasuk;
use App\Traits\FlashAlert;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuratMasuk::all();
        return view('admin.pages.surat_masuk.index', [
            'data' => $data,
            'subSuratMasuk' => 'active',
            'title' => 'Arsip Surat Masuk',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.surat_masuk.create', [
            'title' => 'Arsip Surat Masuk',
            'subSuratMasuk' => 'active'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'judul_surat' => ['required','string','max:50'],
            'asal_surat' => ['required','string' ,'max:30'],
            'nomer_surat' => ['required','string','max:50'],
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'pengirim_surat' => ['required','string','max:30'],
            'tanggal_surat' => ['required','date']
        ]);

        if($request->file('file'))
        {
            $file = $request->file('file')->store('arsip','public');
        }

        $data = SuratMasuk::create([
            'judul_surat' => $request->input('judul_surat'),
            'asal_surat' => $request->input('asal_surat'),
            'nomer_surat' => $request->input('nomer_surat'),
            'file' => $file,
            'jenis_surat' => 'surat_masuk',
            'pengirim_surat' => $request->input('pengirim_surat'),
            'tanggal_surat' => $request->input('tanggal_surat'),
        ]);

        return redirect()->route('admin.surat_masuk.index')->with($this->alertCreated());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = SuratMasuk::findOrFail($id);
        if ($data->file && file_exists(storage_path('app/public/'. $data->file))){
            \Storage::delete('public/'.$data->file);
        }
        $data->delete();
        return redirect()->route('admin.surat_masuk.index')->with($this->alertDeleted());
    }
}
