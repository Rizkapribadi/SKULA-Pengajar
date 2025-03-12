@extends('layouts.layout')
@section('content')
@foreach($materis as $materi) 
<div id="app">	        
  <div class="container">
    <div class="block-header">
      <h2>Topik {{ $materi->order }}</h2>
    </div>                    
    <div class="col-lg-7 col-md-4 col-sm-10 col-xs-12">
      <div class="card">
       @if($materi->published=="true")
       <div class="header bg-grey">
         <a href="{{ route('materi.detail', $materi) }}">
           <h2>
            {{ $materi->title }} <small>{{ $materi->pelajaran->name }}</small>
          </h2>
        </a>
        <ul class="header-dropdown m-r--5">
          <li> 
            <i class="material-icons">check_circle</i>
          </li>
        </ul>
      </div>
      @elseif (strlen($materi->pelajaran->name) <= 8 )
      <div class="header bg-yellow">
       <a href="{{ route('materi.detail', $materi) }}">
         <h2>
          {{ $materi->title }} <small>{{ $materi->pelajaran->name }}</small>
        </h2>
      </a>
    </div>
    @elseif (strlen($materi->pelajaran->name) == 14 )
    <div class="header bg-pink">
     <a href="{{ route('materi.detail', $materi) }}">
       <h2>
        {{ $materi->title }} <small>{{ $materi->pelajaran->name }}</small>
      </h2>
    </a>
  </div>
  @elseif (strlen($materi->pelajaran->name) == 10 )
  <div class="header bg-red">
   <a href="{{ route('materi.detail', $materi) }}">
     <h2>
      {{ $materi->title }} <small>{{ $materi->pelajaran->name }}</small>
    </h2>
  </a>
</div>
@elseif (strlen($materi->pelajaran->name) == 16 )
<div class="header bg-cyan">
  <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ $materi->title }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@else
<div class="header bg-green">
  <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ $materi->title }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@endif
   <div class="body">
     {!! str_limit ($materi-> content, 100,' ...') !!}
   <a href="{{ route('materi.detail', $materi) }}" >[Read more]</a>
  </div>
  </div>
 </div>              
</div>
@endforeach
 <div class="container"> 
   </div>
<div class="container">               
  <a href="{{ route('materi.create') }}" class="btn btn-sm btn-info btn-flat pull-center">Tambah Materi</a>     
</div>
<hr>
<h3>Visibility (Frontend)</h3>
<table-draggable :materis="{{$materis}}"></table-draggable>
</div>  
 @section('extra-js')
   <script src="{{ asset('js/app.js') }}"></script>
 @endsection
@endsection