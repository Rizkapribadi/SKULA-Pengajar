@extends('layouts.layout')

@section('content')
<div class="block-header">
    <h2>Edit Pelajaran</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="body">
        <center><img src="{{ asset('asset/images/concept.png') }}" width="1260" height="250" /></center>
    </div>
    <div class="card">
        <div class="header">        
            <h2>
             EDIT PELAJARAN
         </h2>
     </div>
     <div class="body">
        <form class="form-horizontal" action="{{ route('pelajaran.update', $pelajaran) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH')}}
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="">Nama Pelajaran</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Nama Pelajaran" value="{{ $pelajaran->name }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="">Pilih Gambar</label>
                </div>
                <div class="col-lg-20 col-md-20 col-sm-10 col-xs-9">
                    <div class="form-group">
                       <img src="{{ asset('manager/'.$pelajaran->gambar) }}" width="100" height="100">
                       <input type="file" name="gambar">
                   </div>
               </div>
           </div>
           @if($errors->has('gambar'))
           <div class="alert alert-danger">
            <p>{{ $errors->first('gambar') }}</p>
        </div>
        @endif
        <div class="row clearfix">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                <input type="submit" class="btn btn-primary" value="Simpan"
            </div>
        </div>
      </form>
    </div>
   </div>
  </div>
</div>
@endsection