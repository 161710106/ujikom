<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Galerry;
use File;
class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = Galerry::with('Kategori')->get();
        return view('galeri.index',compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('galeri.create',compact('kategoris'));
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
            'kategori_id' => 'required|'
        ]);
        $galeris = new Galerry;
        $galeris->kategori_id = $request->kategori_id;
        $galeris->foto = $request->foto;
        //upload foto
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. 'assets/img/fotogaleri';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
            $galeris->foto = $filename;
        }
        $galeris->save();
        return redirect()->route('galeris.index');
    }

    public function Publish($id)
    {
        $galeris = Galerry::find($id);

        if ($galeris->status === 1) {
            $galeris->status = 0;
        } else {
            $galeris->status= 1;
        }

        $galeris->save();
        return redirect()->route('galeris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeris = Galerry::findOrFail($id);
        $kategoris = Kategori::all();
        $selectedkategori = Galerry::findOrFail($id)->kategori_id;
        return view('galeri.edit',compact('galeris','kategoris','selectedkategori'));
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
            'kategori_id' => 'required|'
        ]);
        $galeris = Galerry::findOrFail($id);
        $galeris->kategori_id = $request->kategori_id;
        $galeris->foto = $request->foto;
        //edit upload foto
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'assets/img/fotogaleri/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
        
 
         if($galeris->foto) {
             $old_foto = $galeris->foto;
             $filepath = public_path() .DIRECTORY_SEPARATOR.'/assets/img/fotogaleri/'
             . DIRECTORY_SEPARATOR . $galeris->foto;
             try {
                 File::delete($filepath);
             } catch(FileNotFoundException $e) {
 
             }
         }
         $galeris->foto = $filename;
     }
     $galeris->save();
         return redirect()->route('galeris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeris = Galerry::findOrfail($id);
        

        if($galeris->foto){
            $old_foto = $galeris->foto;
            $filepath = public_path() .DIRECTORY_SEPARATOR.'assets/img/fotogaleri/'
            . DIRECTORY_SEPARATOR . $galeris->foto;

            try{
                File::delete($filepath);
            } catch (FileNotFoundException $e) {

            }
        }
        $galeris->delete();

        return redirect()->route('galeris.index');
    }
}
