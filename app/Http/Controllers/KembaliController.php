<?php

namespace App\Http\Controllers;

use App\Kembali;

use App\Barangg;
use App\Pinjam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kembali= Kembali::all();
        return view('pengembalian.index',compact('kembali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjam = Pinjam::all();
        return view('pengembalian.create',compact('pinjam'));
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
            
            'tgl_kembali_akhir'=>'required|',
            'pinjam_id'=>'required|'
        ]);
        $pengembalian= new Kembali;
        $pengembalian->tgl_kembali_akhir = $request->tgl_kembali_akhir;

        $awal = new Carbon($pengembalian->pinjam_id = $request->tgl_sewa);
        $akhir = new Carbon ($request->tgl_kembali_akhir);
        $hasil = "{$awal->diffInDays($akhir)}";

        $pengembalian->jumlah_hari = $hasil;
        $pengembalian->telat = $hasil- ($pengembalian->pinjam_id = $request->jumlah_hari);
        
        $pinjam = Pinjam::where('id', $request->pinjam_id)->first();
        $harga = $pinjam->Barangg->harga;
       
        $pengembalian->denda = $hasil * $harga;
        $pengembalian->total_harga = $pinjam->total_sewa + $pengembalian->denda;
        $pengembalian->pinjam_id = $request->pinjam_id;
        $pengembalian->save();
        return redirect()->route('pengembalian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function show(Kembali $kembali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $kembali = Kembali::findOrFail($id);
        $pinjam = Pinjam::all();
        $selectedpinjam = Kembali::findOrFail($id);
        return view('pengembalian.edit',compact('kembali','pinjam','selectedpinjam'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'tgl_kembali_akhir' => 'required',
            'pinjam_id' => 'required',
            'jumlah_hari' => 'required',
            'telat' => 'required'
            
            ]);
            
    
        $pengembalian = Kembali::findOrFail($id);
        $pengembalian->tgl_kembali_akhir = $request->tgl_kembali_akhir;
        
        $awal = new Carbon($pengembalian->pinjam_id = $request->tgl_sewa);
        $akhir = new Carbon ($request->tgl_kembali_akhir);
        $hasil = "{$awal->diffInDays($akhir)}";

        $pengembalian->jumlah_hari = $hasil;
        $pengembalian->telat = $hasil - ($pengembalian->pinjam_id = $request->jumlah_hari);
        
        $pinjam = Pinjam::where('id', $request->pinjam_id)->first();
        $harga = $pinjam->Barangg->harga;

        $pengembalian->denda = $hasil * $harga;
        $pengembalian->total_harga = $pinjam->total_sewa + $pengembalian->denda;

        $pengembalian->pinjam_id = $request->pinjam_id;
        $pengembalian->save();
        return redirect()->route('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $pengembalian = Kembali::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.index');
    }
}
