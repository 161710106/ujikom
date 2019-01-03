<?php

namespace App\Http\Controllers;

use App\Harga;
use App\Kategori;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hargas = Harga::with('Kategori')->get();
        return view('harga.index',compact('hargas'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('harga.create',compact('kategoris'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'jenispaket' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            ]);
            $hargas = new Harga;
            $hargas->jenispaket = $request->jenispaket;
            $hargas->harga = $request->harga;
            $hargas->kategori_id = $request->kategori_id;
            $hargas->save();
            return redirect()->route('harga.index');
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function show(Harga $harga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $hargas = Harga::findOrFail($id);
        $kategoris = Kategori::all();
        $selectedkategori = Harga::findOrFail($id)->kategori_id;
        return view('harga.edit',compact('hargas','kategoris','selectedkategori'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'jenispaket' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            ]);
            $hargas = Harga::findOrFail($id);
            $hargas->jenispaket = $request->jenispaket;
            $hargas->harga = $request->harga;
            $hargas->kategori_id = $request->kategori_id;
            $hargas->save();
         return redirect()->route('harga.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hargas = Harga::findOrFail($id);
        $hargas->delete();
        return redirect()->route('harga.index');
    }
}
