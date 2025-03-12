@extends('layouts.layout')
@section('content')
<div id="app">
	@foreach($materis as $materi) 
	<input type= "hidden" value="{{ $materi->title }}">
  <input type= "hidden" value="{{ $materi->pelajaran->name }}">
  <input type="hidden" value="{{ $materi->content }}">
  @endforeach  
  <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
   <div class="panel panel-danger">
    <div class="panel-heading" role="tab" id="headingTwo_1">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false"
        aria-controls="collapseTwo_1">
         Untuk Mengubah Urutan Topik, <u>Silahkan Klik disini </u>
      </a>
    </h4>
  </div>
  <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
    <div class="panel-body">
     <table-draggable :materis="{{$materis}}"></table-draggable>
   </div>
 </div>
</div> 

<div class="container-fluid" data-toggle="tooltip" data-placement="right" title="tambah materi">               
       <a href="{{ route('pelajaran.createMateri', $pelajaran) }}" class="btn btn-primary m-t-15 waves-effect"><i class="fa fa-plus"></i>  Tambah Materi</a>     
   </div> 
   </div>  
  <hr>
@foreach($materily as $materi)         
<div class="container-fluid"> 
 <div class="row">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    @if($materi->order=="baru")
    <div class="block-header">
      <h2>Topik  <span class="badge bg-pink">{{ $materi->order }}</span></h2>
    </div>
    @else
    <div class="block-header">
      <h2>Topik {{ $materi->order }}</h2>
    </div>
    @endif
    <div class="card">
     @if($materi->published=="true")
     <div class="header bg-grey">
       <a href="{{ route('materi.detail', $materi) }} ">
         <h2>
          {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
        </h2>
      </a>
      <ul class="header-dropdown m-r--5">
        <li> 
          <i class="material-icons">check_circle</i>
        </li>
      </ul>
    </div>
    @elseif (strlen($materi->title) <= 14 )
    <div class="header bg-orange">
     <a href="{{ route('materi.detail', $materi) }}">
       <h2>
        {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
      </h2>
    </a>
  </div>
  @elseif (strlen($materi->title) <= 17 )
  <div class="header bg-pink">
   <a href="{{ route('materi.detail', $materi) }}">
     <h2>
      {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
    </h2>
  </a>
</div>
@elseif (strlen($materi->title) <= 20 )
<div class="header bg-teal">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@elseif (strlen($materi->title) <= 20 )
<div class="header bg-red">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
     {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
   </h2>
 </a>
</div>
@elseif (strlen($materi->title) <= 24 )
<div class="header bg-cyan">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@elseif (strlen($materi->title) <= 6 )
<div class="header bg-indigo">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@else
<div class="header bg-green">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@endif
     <div class="body">
       {!! str_limit ($materi-> content, 110,'...') !!}
     <a href="{{ route('materi.detail', $materi) }}" >[Lebih Lanjut]</a>
   </div>
  </div>
</div>              
@endforeach  
</div>
   {{ $materily->links() }}
  
  </div> 
</div>
   @section('extra-js')
     <script src="{{ asset('js/app.js') }}"></script>
   @endsection
@endsection