<?php

namespace App\Http\Controllers;

use App\Barangg;
use App\Kategoribarang;
use Illuminate\Http\Request;

class BaranggController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barangg::with('Kategoribarang')->get();
        return view('barang.index',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategoribarang::all();
        return view('barang.create',compact('kategoris'));
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
            'nama_barang' => 'required|',
            'kode' => 'required|',
            'jenis' => 'required|',
            'stock' => 'required|',
            'harga' => 'required|',
            'kategoribarang_id' => 'required|'
             ]);
             for($id = 0; $id < count($request->nama_barang); $id++){
                $barangs = new Barangg;
                $barangs->nama_barang = $request->nama_barang[$id];
                $barangs->kode = $request->kode[$id];
                $barangs->jenis = $request->jenis[$id];
                $barangs->stock = $request->stock[$id];
                $barangs->harga = $request->harga[$id];
                $barangs->kategoribarang_id = $request->kategoribarang_id[$id];
                $barangs->save();
                
            }
        return redirect()->route('barangs.index');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barangg::findOrFail($id);
        $kategoris = Kategoribarang::all();
        return view('barang.edit',compact('barangs','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_barang' => 'required',
            'kode' => 'required',
            'jenis' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'kategoribarang_id' => 'required',
      

       ]);

       $barangs = Barangg::findOrFail($id);
       $barangs->nama_barang = $request->nama_barang;
       $barangs->kode = $request->kode;
       $barangs->jenis = $request->jenis;
    $barangs->stock = $request->stock;
    $barangs->harga = $request->harga;
    $kategoris->kategoribarang_id = $request->kategoribarang_id;
  
       $barangs->save();
       return redirect()->route('barangs.index');
   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = Barangg::findOrFail($id);
        $barangs->delete();
        return redirect()->route('barangs.index');
    }
}
