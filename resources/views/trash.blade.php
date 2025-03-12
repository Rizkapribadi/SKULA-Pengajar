@extends('layouts.layout')

@section('content')
<div class="container-fluid">
 <div class="block-header">
    <h2>Menu Archive</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
         <center><img src="{{ asset('asset/images/trashing.png') }}" width="1260" height="250" /></center>
     </div>
     <br>
     <br>
 </div>	
</div>
@if(count($materis))
@foreach($materis as $materi)  
<div class="row-center">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
            <div class="header bg-grey">

               <h2>
                  {{ str_limit($materi->title, 30,'...') }} <small>{{ $materi->pelajaran->name }}</small>
              </h2>
              <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#pulihkan">Pulihkan dari Penghapusan</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#hapusPermanen">Hapus Secara Permanen</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
         {!! str_limit ($materi-> content, 115,' ...') !!}
     </div>
 </div>
</div> 
<div class="modal fade" id="hapusPermanen" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Penghapusan Materi Secara Permanen </h4>
            </div>
            <div class="modal-body">
                Materi yang dihapus secara permanen tidak akan dapat dipulihkan lagi. Apa Anda yakin ingin menghapus
                materi ini?
            </div>
            <div class="modal-footer">
              <a href="{{ route('forceDelete', $materi) }}"  class="btn btn-link waves-effect btn-flat pull-center">HAPUS PERMANEN</a>
              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
          </div>
      </form>
  </div>
</div>
</div>
<div class="modal fade" id="pulihkan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Pulihkan dari Penghapusan </h4>
            </div>
            <div class="modal-body">
                Apa Anda yakin ingin memulihkan
                materi ini dari penghapusan?
            </div>
            <div class="modal-footer">
              <a href="{{ route('restore', $materi) }}"  class="btn btn-link waves-effect btn-flat pull-center">PULIHKAN MATERI</a>
              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
          </div>
      </form>
  </div>
</div>
</div>
@endforeach				
</div>		
</div>
{!! $materis->render()!!}
@else
<div class="block-header">
  <center><h1>Archive Kosong</h1></center>
</div>
@endif
@endsection