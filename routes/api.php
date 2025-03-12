<?php

use Illuminate\Http\Request;
use App\Pelajaran;
use App\Materi;

Route::get('/pelajarans',function(){
	 $pelajarans = Pelajaran::all();	
	 return collect(['pelajarans' => $pelajarans])->toJson();
});

Route::get('/materis',function(){
	$materis = Materi::all();
	return collect(['materis' => $materis])->toJson();
});

Route::get('/pelajarans/{pelajaran_id}',function($pelajaran_id){
      $pelajarans = Pelajaran::findOrFail($pelajaran_id); 
      $materis = Materi::where('pelajaran_id',$pelajaran_id)->orderBy('order', 'asc')->get();
	  return collect(['materis' => $materis])->toJson();	   
 });