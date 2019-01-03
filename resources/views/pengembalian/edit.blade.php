@extends('layouts.admin')
@section('js')
<script src="{{ asset('asset/tinymce/js/tinymce/tinymce.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: 'print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools  contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
 
</script>
@endsection
@section('header')
<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="icon dripicons-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('pengembalian.index')}}">pengembalian</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit pengembalian</a></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah pengembalian</h5>
        <form action="{{ route('pengembalian.update',$kembali->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
			
			<input type="hidden" name="jumlah_hari" value="{{$kembali->jumlah_hari}}">
			<input type="hidden" name="total_sewa" value="{{$kembali->total_sewa}}">
			<input type="hidden" name="tgl_kembali_akhir" value="{{$kembali->tgl_kembali_akhir}}">			
			<input type="hidden" name="jumlah_hari_akhir" value="{{$kembali->jumlah_hari_akhir}}">
			<input type="hidden" name="telat" value="{{$kembali->telat}}">
			<input type="hidden" name="denda" value="{{$kembali->denda}}">
			<input type="hidden" name="total_harga" value="{{$kembali->total_harga}}">

			<div class="form-group">
				<div class="col-md-4">
					
				</div>
			</div>
            <div class="form-group {{ $errors->has('pinjam_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Sewa</label>	
			  			<select name="pinjam_id" class="form-control">
			  				@foreach($pinjam as $data)
			  				<option value="{{ $data->id }}" {{ $selectedpinjam->pinjam_id == $data->id ? 'selected="selected"' : '' }} >{{ $data->tgl_sewa }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('pinjam_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pinjam_id') }}</strong>
                            </span>
                        @endif
					  </div>

			  <div class="form-group {{ $errors->has('tgl_kembali_akhir') ? ' has-error' : '' }}">
			  			<label class="control-label">tgl_kembali_akhir</label>	
			  			<input type="date" value="{{ $kembali->tgl_kembali_akhir }}" name="tgl_kembali_akhir" class="form-control"  required>
			  			@if ($errors->has('tgl_kembali_akhir'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_kembali_akhir') }}</strong>
                            </span>
                        @endif
			  		</div>

					 <div class="card-footer bg-light">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary clear-form">Clear</button>
            </div>
        </form>
    </div>
	<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>

</div>
@endsection