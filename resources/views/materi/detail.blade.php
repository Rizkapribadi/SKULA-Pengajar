 @extends('layouts.layout')
 @section('content')
 <div class="block-header">
    <h2>Menu Materi</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
           <div class="header">
              <form class="" action="{{ route('updatedetail', $materi) }}" method="post">
                 {{ csrf_field() }}
                 {{ method_field('PATCH')}}
                 @if($materi->published=="true")
                 <input type="checkbox" checked name="published" id="checkbox">
                 <label for="checkbox">Ditandai selesai oleh <strong>{{ $materi->pengajar }}</strong></label>
                 
                 &nbsp;<button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                 <input type="hidden" name="title" value="{{ $materi->title }}" >
                 <input type="hidden" name="content" value="{{ $materi->content }}" >
                 <input type="hidden" name="slug" value="{{ $materi->slug }}" >
                 <input type="hidden" name="order" value="{{ $materi->order }}" >
                 <input type="hidden" name="pelajaran_id" value="{{ $materi->pelajaran_id }}" >
             </form>			
             @else                        
            <input type="checkbox" name="published" id="checkbox" required> 
            <label for="checkbox">Tandai sudah selesai</label>
              <div class="col-lg-2 col-md-1 col-sm-1 col-xs-1"> 
                <div class="form-group">
                 <div class="form-line">
                     <input type="text" class="form-control" name="pengajar" placeholder="Isi nama pengajar" value="{{ $materi->null }}" required>
                  </div>
                </div>
              </div>
             &nbsp;<button type="submit" class="btn btn-primary waves-effect">Simpan</button>
             <input type="hidden" name="title" value="{{ $materi->title }}" >
             <input type="hidden" name="content" value="{{ $materi->content }}" >
             <input type="hidden" name="slug" value="{{ $materi->slug }}" >
             <input type="hidden" name="order" value="{{ $materi->order }}" >
             <input type="hidden" name="pelajaran_id" value="{{ $materi->pelajaran_id }}" >
         </form>			
         @endif
         <ul class="header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="#" data-toggle="modal" data-target="#hapusModal">Archive Materi</a></li>
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <li><a href="{{ route('materi.edit', $materi) }}">Ubah Materi</a></li>       
                </ul>
            </li>
        </ul>
    </div>
    <center> <h2>{{ $materi->title }}</h2>| <small>{{ $materi->pelajaran->name }} </small>|</center>      
    <div class="body">      
       <p>{!! $materi-> content !!}</p>
    </div>
   </div>
 </div>
</div>

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Materi akan di Archive</h4>
            </div>
            <div class="modal-body">
                Materi berikut akan di archive. Apa Anda yakin ingin mengarchive
                materi ini?
            </div>
            <form class="" action="{{ route('materi.destroy', $materi) }}" method="post">
               {{ csrf_field() }}
               {{ method_field('DELETE')}}
               <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect">ARCHIVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection