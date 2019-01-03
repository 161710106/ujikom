<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index',compact('kategoris'));
    }

    /**Alert::success('Data Successfully Saved','Good Job!')->autoclose(1700);
            
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('kategori.create');
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
            'slug' => '',
           
        ]);

        $kategoris = new Kategori;
        $kategoris->kategori = $request->kategori;
        $kategoris->slug =str_slug($request->kategori,'-');
        $kategoris->save();
        return redirect()->route('kategoris.index');
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
        $kategoris = Kategori::findOrFail($id);
        return view('kategori.edit',compact('kategoris'));
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

        $kategoris = Kategori::findOrFail($id);
        $kategoris->kategori = $request->kategori;
        $kategoris->save();
        return redirect()->route('kategoris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

        $kategoris = Kategori::findOrFail($id);
        $kategoris->delete();
        return redirect()->route('kategoris.index');
    }
}
