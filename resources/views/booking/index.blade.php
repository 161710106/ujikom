@extends('layouts.admin')
@section('css')

@endsection
@section('js')
<script src="{{asset('/asset/js/components/datatables-init.js')}}"></script>
@endsection
@section('header')
<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="icon dripicons-home"></i></a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">bookings</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-12">
     <center>
        <a href="{{ route('booking.create') }}" class="btn btn-primary btn-rounded btn-floating btn-outline">
            Tambah Data
        </a>
    </center><br><br>
    <div class="card">
        <h5 class="card-header">
        bookings
        </h5>
        <div class="card-body">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
								<th>No</th>
                                <th>Nama Pemesan</th>
			  		  <th>Waktu </th>
			  		  <th>Tanggal</th>
					  <th>Tempat</th>
                      <th>kategori</th>
                      <th>Jenis Paket</th>
                      <th>Harga</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($booking as $data)
				  	  <tr>
				  	  <td>{{ $no++ }}</td>
                        <td>{{ $data->nama}}</td>
				    	<td>{{ $data->waktu}}</td>
                        <td>{{ $data->date}}</td>
							<td>{!! $data->tempat !!}</td>
							<td><p>{{ $data->kategori->kategori }}</p></td>
                            <td><p>{{ $data->Harga->jenispaket }}</p></td>
                            <td><p>{{ $data->Harga->harga }}</p></td>
                    <td>
                        <form method="post" action="{{ route('booking.destroy',$data->id) }}">
                        <a href="{{ route('booking.edit',$data->id) }}" class="btn btn-warning btn-outline">Edit</a>
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-outline js-submit-confirm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                </tbody>

            </table>


        </div>
    </div>
</div>
@endsection
