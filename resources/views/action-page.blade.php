@extends('layouts.layout')

@section('content')
<div class="block-header">
    <h2>Menu Ekspor dan Impor Materi</h2>
</div>  
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue">		
                <h2>
                    Ekspor Materi
                </h2>
            </div>
            <div class="rcorners">
                <div class="font-bold m-b--35"></div>
                <ul class="dashboard-stat-list">
                 <br> 
                 <center> <div class="container-fluid">               
                    <a href="{{ route('materi.export') }}" class="btn btn-primary m-t-15 waves-effect">Ekspor Materi</a>     
                </div>   </center>    <br>
                <br> 
                <br> 
                <br>                           
            </ul>
        </div>
    </div>
</div>

<!-- Answered Tickets -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header bg-blue">		
            <h2>
                Impor Materi
            </h2>
        </div>
        <div class="rcorners2">
            <div class="font-bold m-b--35"></div>
            <ul class="dashboard-stat-list">
                <form class="form-horizontal" action="{{ route('materi.import') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <br> 
                    <br>  
                    <center>
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <div class="form-group">    
                              <br>  
                              <input type="file" name="dok" class="validate" required>   
                          </div> 
                      </div>

                      <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Impor Materi">
                  </center>
                  <br>
                  <br> 

                  @if($errors->has('dok'))
                  <div class="alert bg-red alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   {{ $errors->first('dok') }}
               </div>
               @endif
           </form>
       </ul>
   </div>
</div>
</div>
</div>
@endsection