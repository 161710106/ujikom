@extends('layouts.admin')
@section('js')
<script src="{{ asset('asset/tinymce/js/tinymce/tinymce.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: 'print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertbatas_pinjamtime advlist lists textcolor wordcount   imagetools  contextmenu colorpicker textpattern help',
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
        <li class="breadcrumb-item"><a href="{{route('pinjam.index')}}">pinjam</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah pinjam</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah pinjam</h5>
                <form action="{{ route('pinjam.store') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="container-fluid">
                      <div class="form-group {{ $errors->has('nik_kons') ? ' has-error' : '' }}">
			  			<label class="control-label">NIK Customer</label>	
			  			<input type="text" name="nik_kons" class="form-control"  required>
			  			@if ($errors->has('nik_kons'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nik_kons') }}</strong>
                            </span>
                        @endif
			  		</div>

			  	
			  		<div class="form-group {{ $errors->has('nama_kons') ? ' has-error' : '' }}">
			  			<label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Customer</label>	
			  			<input type="text" name="nama_kons" class="form-control"  required>
			  			@if ($errors->has('nama_kons'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_kons') }}</strong>
                            </span>
                        @endif
			  		</div>

			  	<div class="form-group {{ $errors->has('jk_kons') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                          <br>
                        <label class="radio-inline">
                            <input type="radio" name="jk_kons" id="inlineRadio1" value="Laki-Laki">Laki-Laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jk_kons" id="inlineRadio2" value="Perempuan">Perempuan
                        </label>
                          @if ($errors->has('jk_kons'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jk_kons') }}</strong>
                            </span>
                          @endif
            </div>


		<div class="col-md-18">

			  	
                  <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                        <label class="control-label">alamat</label> 
                        <Textarea id="text" type="ckeditor" name="alamat" class="ckeditor"  required></Textarea>
                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div> 

			  			<div class="form-group {{ $errors->has('no_hp') ? ' has-error' : '' }}">
			  			<label class="control-label col-md-3 col-sm-3 col-xs-3">No Hp Customer</label>	
			  			<input type="text" name="no_hp" class="form-control"  required>
			  			@if ($errors->has('no_hp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_hp') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  		<div class="form-group {{ $errors->has('tgl_sewa') ? ' has-error' : '' }}">
			  			<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Sewa Customer</label>	
			  			<input type="date" name="tgl_sewa" class="form-control"  required>
			  			@if ($errors->has('tgl_sewa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_sewa') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  		<div class="form-group {{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
			  			<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Kembali Customer</label>	
			  			<input type="date" name="tgl_kembali" class="form-control"  required>
			  			@if ($errors->has('tgl_kembali'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_kembali') }}</strong>
                            </span>
                        @endif
			  		</div>
            <div class="form-group {{ $errors->has('barangg_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Barang</label>	
			  			<select name="barangg_id" class="form-control">
			  				@foreach($barang as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('barangg_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('barangg_id') }}</strong>
                            </span>
                        @endif
					</div> 
                    
  <div class="card-footer bg-light">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary clear-form">Clear</button>
            </div>
            </div
        </form>
    </div>
	<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection

