<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SuratKeluar;
use App\Traits\FlashAlert;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data = SuratKeluar::all();
        return view('admin.pages.surat_keluar.index', [
            'data' => $data,
            'title' => 'Arsip Surat Keluar',
            'subSuratKeluar' => 'active'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.surat_keluar.create',[
            'title' => 'Arsip Surat Keluar',
            'subSuratKeluar' => 'active'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomer_surat' => ['required','string','max:50'],
            'penerima_surat' => ['required','string','max:30'],
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
        ]);

        if($request->file('file'))
        {
            $file = $request->file('file')->store('arsip','public');
        }

        $data = SuratKeluar::create([
            'nomer_surat' => $request->input('nomer_surat'),
            'penerima' => $request->input('penerima_surat'),
            'file' => $file,
            'jenis_surat' => 'surat keluar',
        ]);

        return redirect()->route('admin.surat_keluar.index')->with($this->alertCreated());

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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SuratKeluar::findOrFail($id);
        if ($data->file && file_exists(storage_path('app/public/'. $data->file))){
            \Storage::delete('public/'.$data->file);
        }
        $data->delete();
        return redirect()->route('admin.surat_keluar.index')->with($this->alertDeleted());

    }
}
