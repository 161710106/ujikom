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
        <li class="breadcrumb-item"><a href="{{route('pinjam.index')}}">pinjam</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit pinjam</a></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah pinjam</h5>
        <form action="{{ route('pinjam.update',$pinjam->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
			
            <div class="form-group {{ $errors->has('nik_kons') ? ' has-error' : '' }}">
			  			<label class="control-label">nik_kons</label>	
			  			<input type="text" value="{{ $pinjam->nik_kons }}" name="nik_kons" class="form-control"  required>
			  			@if ($errors->has('nik_kons'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nik_kons') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('nama_kons') ? ' has-error' : '' }}">
			  			<label class="control-label">nama_kons</label>	
			  			<input type="text" value="{{ $pinjam->nama_kons }}" name="nama_kons" class="form-control"  required>
			  			@if ($errors->has('nama_kons'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_kons') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jk_kons') ? ' has-error' : '' }}">
			  			<label class="control-label">jk_kons</label>	
			  			<input type="text" value="{{ $pinjam->jk_kons }}" name="jk_kons" class="form-control"  required>
			  			@if ($errors->has('jk_kons'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jk_kons') }}</strong>
                            </span>
                        @endif
			  		</div>

			  			<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">alamat</label>	
			  			<Textarea id="text" type="ckeditor" name="alamat" class="ckeditor"  required>{{ $pinjam->alamat }}</Textarea>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('no_hp') ? ' has-error' : '' }}">
			  			<label class="control-label">no_hp</label>	
			  			<input type="text" value="{{ $pinjam->no_hp }}" name="no_hp" class="form-control"  required>
			  			@if ($errors->has('no_hp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_hp') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tgl_sewa') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Sewa</label>	
			  			<input type="date" value="{{ $pinjam->tgl_sewa }}" name="tgl_sewa" class="form-control"  required>
			  			@if ($errors->has('tgl_sewa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_sewa') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
			  			<label class="control-label">tgl_kembali</label>	
			  			<input type="date" value="{{ $pinjam->tgl_kembali }}" name="tgl_kembali" class="form-control"  required>
			  			@if ($errors->has('tgl_kembali'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_kembali') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jumlah_hari') ? ' has-error' : '' }}">
			  			<label class="control-label">jumlah_hari</label>	
			  			<input type="text" value="{{ $pinjam->jumlah_hari }}" name="jumlah_hari" class="form-control"  required>
			  			@if ($errors->has('jumlah_hari'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah_hari') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('total_sewa') ? ' has-error' : '' }}">
			  			<label class="control-label">total_sewa</label>	
			  			<input type="text" value="{{ $pinjam->total_sewa }}" name="total_sewa" class="form-control"  required>
			  			@if ($errors->has('total_sewa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total_sewa') }}</strong>
                            </span>
                        @endif
			  		</div>
                      <div class="form-group {{ $errors->has('barangg_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kategori</label>	
			  			<select name="barangg_id" class="form-control">
			  				@foreach($barang as $data)
			  				<option value="{{ $data->id }}" {{ $selectedbarangg->barangg_id == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_barang }}</option>
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
        </form>
    </div>
	<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>

</div>
@endsection