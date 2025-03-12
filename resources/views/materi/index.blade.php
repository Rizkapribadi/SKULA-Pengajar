@extends('layouts.layout')
@section('content')
<div class="container-fluid"> 
 <div class="block-header">
  <h2>Daftar Semua Materi</h2>
</div>  
@foreach($materis as $materi)    
<div class="row-center">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="block-header">
      <h2>Topik {{ $materi->order }}</h2>
    </div>
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
    @elseif (strlen($materi->title) <= 8 )
    <div class="header bg-orange">
     <a href="{{ route('materi.detail', $materi) }}">
       <h2>
        {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
      </h2>
    </a>
  </div>
  @elseif (strlen($materi->title) <= 10 )
  <div class="header bg-pink">
   <a href="{{ route('materi.detail', $materi) }}">
     <h2>
      {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
    </h2>
  </a>
</div>
@elseif (strlen($materi->title) <= 12 )
<div class="header bg-teal">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@elseif (strlen($materi->title) <= 15 )
<div class="header bg-red">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
     {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
   </h2>
 </a>
</div>
@elseif (strlen($materi->title) <= 18 )
<div class="header bg-cyan">
 <a href="{{ route('materi.detail', $materi) }}">
   <h2>
    {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
  </h2>
</a>
</div>
@elseif (strlen($materi->title) <= 20 )
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
 {{ $materis->links() }}
</div> 
@endsection