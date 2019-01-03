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
        <li class="breadcrumb-item"><a href="{{route('userr.index')}}">userr</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah userr</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah userr</h5>
                <form action="{{ route('userr.store') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
					  <div class="form-group {{$errors->has('nama') ? 'has-error' : '' }}">
				<label class="control-label">Nama</label>
				<input type="text"  name="nama" class="form-control" required>
				@if ($errors->has('nama'))
				<span class="help-block"><strong>{{ $errors->first('nama') }}</strong></span>
				@endif
			</div>
			<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                        <label class="control-label">alamat</label> 
                        <Textarea id="text" type="ckeditor" name="alamat" class="ckeditor"  required></Textarea>
                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>  
			<div class="form-group {{$errors->has('nohp') ? 'has-error' : '' }}">
				<label class="control-label">No Hp</label>
				<input type="text"  name="nohp" class="form-control" required>
				@if ($errors->has('nohp'))
				<span class="help-block"><strong>{{ $errors->first('nohp') }}</strong></span>
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

