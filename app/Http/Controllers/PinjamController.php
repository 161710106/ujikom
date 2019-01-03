<?php

namespace App\Http\Controllers;

use App\Pinjam;
use App\Barangg;
use App\Userr;
use Carbon\Carbon;


use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam = Pinjam::with('Barangg')->get();
        return view('pinjam.index',compact('pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $barang = Barangg::all();
           
            return view('pinjam.create',compact('barang'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request,[
                'nik_kons' => 'required|',
                'nama_kons' => 'required|',
                'jk_kons' => 'required|',
                'alamat' => 'required|',
                'no_hp' => 'required|',
                'tgl_sewa' => 'required|',
                'tgl_kembali' => 'required|',
                'barangg_id' => 'required|'
                
            ]);
            $pinjam = new Pinjam;
            $pinjam->nik_kons = $request->nik_kons;
            $pinjam->nama_kons = $request->nama_kons;
            $pinjam->jk_kons = $request->jk_kons;
            $pinjam->alamat = $request->alamat;
            $pinjam->no_hp = $request->no_hp;
            $pinjam->tgl_sewa = $request->tgl_sewa;
            $pinjam->tgl_kembali = $request->tgl_kembali;
            $pinjam->barangg_id = $request->barangg_id;
            $awal = new Carbon($request->tgl_sewa);
            $akhir = new Carbon ($request->tgl_kembali);
            $hasil = "{$awal->diffInDays($akhir)}";
            $pinjam->jumlah_hari = $hasil;

            $barang = Barangg::where('id', $pinjam->barangg_id)->first();
            
            $harga = $barang->harga;
            $pinjam->total_sewa=$harga * $hasil;
    
            $pinjam->save();
            return redirect()->route('pinjam.index');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $barang = Barangg::all();
       
        $selectedbarangg = pinjam::findOrFail($id);
       
        return view('pinjam.edit',compact('pinjam','barang','selectedbarangg'));
        
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
   



        $pinjam = Pinjam::findOrFail($id);
    $pinjam->nik_kons = $request->nik_kons;
    $pinjam->nama_kons = $request->nama_kons;
    $pinjam->jk_kons = $request->jk_kons;
    $pinjam->alamat = $request->alamat;
    $pinjam->no_hp = $request->no_hp;
    $pinjam->tgl_sewa = $request->tgl_sewa;
    $pinjam->tgl_kembali = $request->tgl_kembali;
    $pinjam->jumlah_hari = $request->jumlah_hari;
    $pinjam->total_sewa = $request->total_sewa;
     $pinjam->barangg_id = $request->barangg_id;
    
     $awal = new Carbon($request->tgl_sewa);
     $akhir = new Carbon ($request->tgl_kembali);
     $hasil = "{$awal->diffInDays($akhir)}";
     $pinjam->jumlah_hari = $hasil;
    $pinjam->save();
    return redirect()->route('pinjam.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->delete();
        return redirect()->route('pinjam$pinjam.index');
    }
}
