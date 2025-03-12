@extends('layouts.layout')
@section('content')
<div class="block-header">
    <h2>Menu Tambah Pelajaran</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="body">
        <center><img src="{{ asset('asset/images/pp.png') }}" width="1277" height="250" /></center>
    </div>
    <div class="card">
        <div class="header">		
            <h2>
                TAMBAH PELAJARAN
            </h2>
        </div>
        <div class="body">
            <form class="form-horizontal" action="{{ route('pelajaran.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="">Nama Pelajaran</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" placeholder="Nama Pelajaran" value="{{ old('name')}}" required >
                            </div>
                        </div>
                    </div>
                </div>
                @if($errors->has('name'))
                <div class="alert bg-red alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   {{ $errors->first('name') }}
               </div>
               @endif

               <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="">Pilih Gambar</label>
                </div>
                <div class="col-lg-20 col-md-20 col-sm-10 col-xs-9">
                    <div class="form-group">      
                        <input type="file" name="gambar" class="validate" required>   
                    </div>
                </div>
            </div>
            @if($errors->has('gambar'))
            <div class="alert bg-red alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               {{ $errors->first('gambar') }}
           </div>
           @endif
           <div class="row clearfix">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
        </div>
      </form>
    </div>
  </div>
 </div>
</div>
@endsection