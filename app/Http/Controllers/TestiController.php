<?php

namespace App\Http\Controllers;

use App\Testi;
use Illuminate\Http\Request;
use File;
class TestiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonis = Testi::all();
        return view('testi.index',compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonis = Testi::all();
        return view('testi.create',compact('testimonis'));
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
            'nama' => 'required',
            'gambar' => '',
            'testimoni' => 'required',

           
        ]);

        $testimonis = new Testi;
        $testimonis->nama = $request->nama;
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path(). '/assets/img/testimoni/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $testimonis->gambar = $filename;
        }    
            $testimonis->testimoni = $request->testimoni;
           
            $testimonis->save();
        return redirect()->route('testi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function show(Testi $testi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonis = Testi::findOrFail($id);
        return view('testi.edit',compact('testimonis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'gambar' => '',
            'testimoni' => 'required',
            
           
       ]);

       $testimonis = Testi::findOrFail($id);
       $testimonis->nama = $request->nama;  
       $testimonis->gambar = $request->gambar;
       
       
       if ($request->file('gambar')) {
           $file = $request->file('gambar');
           $destinationPath = public_path(). '/assets/img/testimoni/';
           $filename = str_random(6).'_'.$file->getClientOriginalName();
           $uploadSuccess = $file->move($destinationPath, $filename);

       if ($testimonis->gambar) {
       $old_gambar = $testimonis->gambar;
       $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/testimoni'
       . DIRECTORY_SEPARATOR . $testimonis->gambar;
           try {
           File::delete($filepath);
           } catch (FileNotFoundException $e) {
       // File sudah dihapus/tidak ada
           }
       }
       $testimonis->gambar = $filename;
       }
           $testimonis->testimoni = $request->testimoni;
           
           $testimonis->save();
       return redirect()->route('testi.index');
   }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testi  $testi
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $testimonis = Testi::findOrfail($id);
        

        if($testimonis->gambar){
            $old_gambar = $testimonis->gambar;
            $filepath = public_path() .DIRECTORY_SEPARATOR.'assets/img/testimoni/'
            . DIRECTORY_SEPARATOR . $testimonis->gambar;

            try{
                File::delete($filepath);
            } catch (FileNotFoundException $e) {

            }
        }
        $testimonis->delete();

        return redirect()->route('testi.index');
    }
}
