@extends('layouts.admin')

@section('header')
<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="icon dripicons-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('barangs.index')}}">barangs</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah barangs</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah barangs</h5>
                <form action="{{ route('barangs.store') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}

          <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
          <table id="item_table" class="table table-bordered">
            <tr id="last">
              <th >Nama Barang</th>
              <th >kode</th>
              <th >Jenis</th>
              <th >Stock</th>
              <th >Harga</th>
              <th >Kategori Barang</th>
              <th><button type="button" name="add" class="btn btn-success btn-sm add" onclick="addrow()"><i class="fa fa-plus-square"></button></th>
            </tr>
          </table>
          </form>

<script type=text/javascript>

 
 function addrow(){
      var no = $('#item_table tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      
      html +='<td><input type="text" name="nama_barang[]" class="form-control nama_barang"/></td>';

      html +='<td><input type="text" name="kode[]" class="form-control kode"/></td>';

      html +='<td><input type="text" name="jenis[]" class="form-control jenis"/></td>';

      html +='<td><input type="text" name="stock[]" class="form-control stock"/></td>';

      html +='<td><input type="text" name="harga[]" class="form-control harga"/></td>';

      html +='<td><select name="kategoribarang_id[]" class="form-control">@foreach($kategoris as $data)<option value="{{$data->id}}">{{$data->kategori}}</option>@endforeach</select></td>';

      html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="fa fa-minus-square"></i></button></td></tr>';
      $('#last').after(html);
      
    }
    function remove(no){
      $('#row_'+no).remove();
    }
   
    
</script>


@endsection

