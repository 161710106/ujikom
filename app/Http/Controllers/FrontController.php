<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fortopolio;
use App\Kategori;
use App\Galerry;
use App\Barangg;
use App\Youtube;
use App\Kategoribarang;
class FrontController extends Controller
{
    public function index ()
 {
 	return view('frontend.index');
 }

 public function galleri()
 {	
	 $kategorig = Galerry::all();
	 $youtube  = Youtube::all();
 	return view('frontend.galleri',compact('kategorig','youtube'));
 }

 public function fortopolio()
 {	
 	$kategorig = Fortopolio::all();
 	return view('frontend.fortopolio',compact('kategorig'));
 }

 public function filter_fortopolio()
 {  
    $kategorif = Fortopolio::where('kategori_id','=',$id)->get();
    return view('frontend.fortopolio',compact('kategorif'));
 }
 public function barang()
 {	
 	$kategoribarang = Barangg::all();
 	return view('frontend.barang',compact('kategoribarang'));
 }
 public function filter_barang()
 {  
    $kategoribarangs = Barangg::where('kategoribarang_id','=',$id)->get();
    return view('frontend.barang',compact('kategoribarangs'));
 }


 public function testimonis()
 {	
 	$testimonis = Testi::findOrFail($id);
 	return view('layouts.front',compact('testimonis'));
 }


 public function single(Fortopolio $fortopolios)
 {
 
 return view('frontend.single',compact('fortopolios'));
 }
    

}