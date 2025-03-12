@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Menu Daftar Pelajaran</h2>
    </div>
@foreach($pelajarans as $pelajaran)
    <div class="row-center">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                @if(strlen($pelajaran->name)<= 10 )					
                <div class="header bg-orange">	
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{ route('pelajaran.edit', $pelajaran) }}">Ubah Pelajaran</a></li>                  
                            </ul>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('pelajaran.show', $pelajaran) }}" >
                    <div class="body bg-orange">
                      @elseif (strlen($pelajaran->name)<= 16 )
                      <div class="header bg-pink">					
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ route('pelajaran.edit', $pelajaran) }}">Ubah Pelajaran</a></li>                  
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('pelajaran.show', $pelajaran) }}" >
                        <div class="body bg-pink">
                          @elseif	(strlen($pelajaran->name)<= 22 )	
                          <div class="header bg-red">	
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('pelajaran.edit', $pelajaran) }}">Ubah Pelajaran</a></li>                  
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('pelajaran.show', $pelajaran) }}" >
                            <div class="body bg-red">
                              @elseif	(strlen($pelajaran->name)<= 25 )
                              <div class="header bg-cyan">	
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="{{ route('pelajaran.edit', $pelajaran) }}">Ubah Pelajaran</a></li>                  
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('pelajaran.show', $pelajaran) }}" >
                                <div class="body bg-cyan">
                                  @else
                                  <div class="header bg-green">	
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="{{ route('pelajaran.edit', $pelajaran) }}">Ubah Pelajaran</a></li>                
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{ route('pelajaran.show', $pelajaran) }}" >
                                    <div class="body bg-green">
                                      @endif
                                      <center><img src="{{ asset('manager/'.$pelajaran->gambar)  }}" width="80" height="80" /></center>
                                      <center><h3>{{  str_limit($pelajaran->name, 28,'...') }}</h3></center>
                                  </div>
                              </a>
                          </div>
                      </div>	
                  </div>     
                @endforeach
              </div>
              {!! $pelajarans->render()!!}
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="{{ route('pelajaran.create') }}" >
                <div class="image" data-toggle="tooltip" data-placement="right" title="tambah pelajaran">
                     <img src="{{ asset('asset/images/rei.png') }}" width="50" height="50"/>
                </div>
            </a>  
        </div>
 @endsection