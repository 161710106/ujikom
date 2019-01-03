<?php

namespace App\Http\Controllers;

use App\Userr;
use Illuminate\Http\Request;

class UserrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userr = Userr::all();
        return view('member.index',compact('userr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
         return view('member.create');
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
            'alamat' => 'required',
            'nohp' => 'required',
            
           
        ]);

        $userr = new Userr;
        $userr->nama = $request->nama;
        $userr->alamat = $request->alamat;
        $userr->nohp = $request->nohp;
     
        $userr->save();
        return redirect()->route('userr.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Userr  $userr
     * @return \Illuminate\Http\Response
     */
    public function show(Userr $userr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userr  $userr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userr = Userr::findOrFail($id);
        return view('member.edit',compact('userr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userr  $userr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required'
            
            

       ]);

       $userr = userr::findOrFail($id);
       $userr->nama = $request->nama;
       $userr->alamat = $request->alamat;
       $userr->nohp = $request->nohp;
       $userr->save();
       return redirect()->route('userr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userr  $userr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userr $userr)
    {
        //
    }
}
