@extends('layouts.layout')

@section('content')

<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<div class="block-header">
 <h2>Menu Tambah Materi</h2>
</div>
<form class="form-horizontal" action="{{ route('materi.store') }}" method="post">
  {{ csrf_field() }}
  <div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="card">          
       <div class="header">
         <div class="row clearfix">
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="">Judul Materi</label>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group  has-feedback{{ $errors->has('title') ? 'has-error' : '' }}">
              <div class="form-line">
                <input type="text" class="form-control" name="title" placeholder="   Judul materi" value="{{ old('title')}}" required >                      
                @if($errors->has('title'))
                <div class="alert bg-red alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 {{ $errors->first('title') }}
               </div>                   
               @endif
             </div>
           </div>
         </div>
       </div>
       <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
          <label for="">Nama Pelajaran</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
          <div class="form-group form-float">
           <select class="form-control show-tick" name="pelajaran_id">
            @foreach ($pelajarans as $pelajaran)
            <option value="{{ $pelajaran->id }}"
             @if ($pelajaran->id === $pelajaran->pelajaran_id)
             selected
             @endif
             >
             {{ $pelajaran->name }}
           </option>
           @endforeach

         </select>
       </div>
     </div>
   </div>
    <input type="checkbox" name="published" value="1">
    <input type="hidden" name="order" value="baru">
    
    <!-- Textarea -->
    <div class="body">	
      <div class="row clearfix">			
        <div class="card">
         <div class="header">
          <h2>Isi Materi </h2>     
        </div>
        <div class="body">                         
          <div class="row clearfix">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="form-line">
                 <textarea name="content" rows="15" class="form-control my-editor" value="{{ old('content')}}"></textarea>
               </div>
             </div>
           </div>
         </div>                     
       </div>
     </div>
   </div>
   @if($errors->has('content'))
   <div class="alert bg-red alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     {{ $errors->first('content') }}
   </div>
   @endif

   <!-- #END# Textarea -->
   <div class="row clearfix">
     <input type="submit" class="btn btn-primary waves-effect"  value="Simpan">
   </div>
 </div>					
</div>			
</div>			 
</div>	
 
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    branding: false,
    contextmenu: "copy | paste | cut | cell row column deletetable",
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern formula"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image media | formula",
    image_description:false,
    relative_urls: false,
    remove_script_host: false,
    convert_urls: true,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'SkulaManager',
        width : x * 0.9,
        height : y * 0.9,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection



