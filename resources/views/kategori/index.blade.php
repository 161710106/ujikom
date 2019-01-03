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
        <li class="breadcrumb-item"><a href="javascript:void(0)">kategoris</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-12">
     <center>
        <a href="{{ route('kategoris.create') }}" class="btn btn-primary btn-rounded btn-floating btn-outline">
            Tambah Data
        </a>
    </center><br><br>
    <div class="card">
        <h5 class="card-header">
        kategoris
        </h5>
        <div class="card-body">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php $no =1; @endphp
                @foreach($kategoris as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->kategori}}</td>
                    <td>
                        <form method="post" action="{{ route('kategoris.destroy',$data->id) }}">
                        <a href="{{ route('kategoris.edit',$data->id) }}" class="btn btn-warning btn-outline">Edit</a>
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
