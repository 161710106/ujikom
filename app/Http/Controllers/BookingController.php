<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Kategori;
use App\Harga;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::with('Harga','Kategori')->get();
        return view('booking.index',compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $hargas = Harga::all();
        return view('booking.create',compact('kategoris','hargas'));
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
            'nama' => 'required|',
            'waktu' => 'required|',
            'date' => 'required|',
            'tempat' => 'required|',
            'kategori_id' => 'required|',
            'harga_id' => 'required|'
        ]);
        $booking = new Booking;
        $booking->nama = $request->nama;
        $booking->waktu = $request->waktu;
        $booking->date = $request->date;
        $booking->tempat = $request->tempat;
        $booking->kategori_id = $request->kategori_id;
        $booking->harga_id = $request->harga_id;
        $booking->save();
        return redirect()->route('booking.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $kategoris = Kategori::all();
        $hargas = Harga::all();
        $selectedkategori = Booking::findOrFail($id)->kategori_id;
        $selectedharga = Harga::findOrFail($id)->harga_id;
        return view('booking.edit',compact('booking','kategoris','hargas','selectedkategori','selectedharga'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'waktu' => 'required',
            'date' => 'required',
            'tempat' => 'required',
           
            'kategori_id' => 'required|',
            'harga_id' => 'required|'
            

       ]);

       $booking = Booking::findOrFail($id);
       $booking->nama = $request->nama;
       $booking->waktu = $request->waktu;
       $booking->date = $request->date;
       $booking->tempat = $request->tempat;
       $booking->kategori_id = $request->kategori_id;
       $booking->harga_id = $request->harga_id;
       $booking->save();
       return redirect()->route('booking.index');
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('booking.index');
    }
}
