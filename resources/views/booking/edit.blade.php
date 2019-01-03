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
        <li class="breadcrumb-item"><a href="{{route('booking.index')}}">booking</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit booking</a></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah booking</h5>
        <form action="{{ route('booking.update',$booking->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
			
			<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Pemesan</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $booking->nama }}"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>
			<div class="form-group {{ $errors->has('waktu') ? ' has-error' : '' }}">
			  			<label class="control-label">waktu</label>	
			  			<input type="time" name="waktu" class="form-control" value="{{ $booking->waktu }}"  required>
			  			@if ($errors->has('waktu'))
                            <span class="help-block">
                                <strong>{{ $errors->first('waktu') }}</strong>
                            </span>
                        @endif
			  		</div>
					  <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
			  			<label class="control-label">date</label>	
			  			<input type="date" name="date" class="form-control" value="{{ $booking->date }}"  required>
			  			@if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
			  		</div>
					  <div class="form-group {{ $errors->has('tempat') ? ' has-error' : '' }}">
			  			<label class="control-label">tempat</label>	
			  			<Textarea id="text" type="ckeditor" name="tempat" class="ckeditor"  required>{{ $booking->tempat }}</Textarea>
			  			@if ($errors->has('tempat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tempat') }}</strong>
                            </span>
                        @endif
			  		</div>
					 
	<div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kategori</label>	
			  			<select name="kategori_id" class="form-control">
			  				@foreach($kategoris as $data)
			  				<option value="{{ $data->id }}" {{ $selectedkategori == $data->id ? 'selected="selected"' : '' }} >{{ $data->kategori }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategori_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategori_id') }}</strong>
                            </span>
                        @endif
					  </div>
                      <div class="form-group {{ $errors->has('harga_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Jenis Paket</label>	
			  			<select name="harga_id" class="form-control">
			  				@foreach($hargas as $data)
			  				<option value="{{ $data->id }}" {{ $selectedharga == $data->id ? 'selected="selected"' : '' }} >{{ $data->jenispaket }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('harga_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga_id') }}</strong>
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