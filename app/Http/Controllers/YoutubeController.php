<?php

namespace App\Http\Controllers;

use App\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtube = Youtube::all();
        
        return view('youtube.index',compact('youtube'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('youtube.create');
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
            'title' => 'required|unique:youtubes',
            'url' => 'required'
        ]);

        $youtube = new Youtube;
        $youtube->title = $request->title;
        $youtube->url = $request->url;
        $youtube->save();
        
        return redirect()->route('youtube.index');
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
        // memanggil data pos berdasrkan id di halaman pos edit
        $youtube = Youtube::findOrFail($id);
        return view('youtube.edit',compact('youtube'));
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
         // unique dihapus karena ketika update data title tidak diubah juga tidak apa-apa
        $this->validate($request,[
            'title' => 'required|unique:youtubes',
            'url' => 'required',
        ]);

        // update data berdasarkan id
        $youtube = Youtube::findOrFail($id);
        $youtube->title = $request->title;
        $youtube->url = $request->url;
        $youtube->save();
        return redirect()->route('youtube.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data beradasarkan id
        $youtube = Youtube::findOrFail($id);
        $youtube->delete();
        return redirect()->route('youtube.index');  
    }


}
