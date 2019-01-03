<?php

namespace App\Http\Controllers;

use App\Kategoribarang;
use Illuminate\Http\Request;

class KategoribarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoribarangs = Kategoribarang::all();
        return view('kategoribarang.index',compact('kategoribarangs'));
    }

    /**Alert::success('Data Successfully Saved','Good Job!')->autoclose(1700);
            
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('kategoribarang.create');
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
            'kategori' => 'required',
            
           
        ]);

        $kategoribarangs = new Kategoribarang;
        $kategoribarangs->kategori = $request->kategori;
        $kategoribarangs->save();
        return redirect()->route('kategoribarangs.index');
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
        $kategoribarangs = Kategoribarang::findOrFail($id);
        return view('kategoribarang.edit',compact('kategoribarangs'));
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
        

         $this->validate($request,[
             'kategori' => 'required',
             

        ]);

        $kategoribarangs = Kategoribarang::findOrFail($id);
        $kategoribarangs->kategori = $request->kategori;
        $kategoribarangs->save();
        return redirect()->route('kategoribarangs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

        $kategoribarangs = Kategoribarang::findOrFail($id);
        $kategoribarangs->delete();
        return redirect()->route('kategoribarangs.index');
    }
}
