<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Fortopolio;
use File;

class FortopolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $fortopolios = Fortopolio::with('Kategori')->get();
        return view('fortopolio.index',compact('fortopolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $kategoris = Kategori::all();
        return view('fortopolio.create',compact('kategoris'));
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
            'foto' => 'required|',
            'deskripsi' => 'required|',
            'kategori_id' => 'required|'
        ]);
        $fortopolios = new Fortopolio;
        $fortopolios->deskripsi = $request->deskripsi;
        $fortopolios->kategori_id = $request->kategori_id;
        $fortopolios->foto = $request->foto;
        //upload foto
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/assets/img/fotofortopolio';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
            $fortopolios->foto = $filename;
        }
        $fortopolios->save();
        return redirect()->route('fortopolios.index');
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
           $fortopolios = Fortopolio::findOrFail($id);
        $kategoris = Kategori::all();
        $selectedkategori = Fortopolio::findOrFail($id)->kategori_id;
        return view('fortopolio.edit',compact('fortopolios','kategoris','selectedkategori'));
   
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
            'foto' => 'required|',
        
            'deskripsi' => 'required|',
            'kategori_id' => 'required|'
        ]);
        $fortopolios = Fortopolio::findOrFail($id);
        $fortopolios->deskripsi = $request->deskripsi;
        $fortopolios->kategori_id = $request->kategori_id;
        $fortopolios->foto = $request->foto;
        //edit upload foto
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'/assets/img/fotofortopolio';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
        
 
         if($fortopolios->foto) {
             $old_foto = $fortopolios->foto;
             $filepath = public_path() .DIRECTORY_SEPARATOR.'/assets/img/fotofortopolio'
             . DIRECTORY_SEPARATOR . $fortopolios->foto;
             try {
                 File::delete($filepath);
             } catch(FileNotFoundException $e) {
 
             }
         }
         $fortopolios->foto = $filename;
     }
     $fortopolios->save();
         return redirect()->route('fortopolios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $fortopolios = Fortopolio::findOrfail($id);
        

        if($fortopolios->foto){
            $old_foto = $fortopolios->foto;
            $filepath = public_path() .DIRECTORY_SEPARATOR.'/assets/img/fotofortopolio'
            . DIRECTORY_SEPARATOR . $fortopolios->foto;

            try{
                File::delete($filepath);
            } catch (FileNotFoundException $e) {

            }
        }
        $fortopolios->delete();

        return redirect()->route('fortopolios.index');
    
    }
}
