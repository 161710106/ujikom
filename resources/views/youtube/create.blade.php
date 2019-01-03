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
        <li class="breadcrumb-item"><a href="{{route('youtube.index')}}">youtube</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah youtube</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
       <center> <h5 class="card-header">Tambah youtube</h5></center>
	   <form action="{{ route('youtube.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
			  		&nbsp	<label class="control-label">Title</label>	
			  			<input type="text" name="title" class="form-control"  required>
			  			@if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
			  		&nbsp	<label class="control-label">Url</label>	
			  			<input type="text" name="url" class="form-control"  required>
			  			@if ($errors->has('url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url') }}</strong>
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

