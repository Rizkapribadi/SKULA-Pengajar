<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Materi extends Model
{
	use SoftDeletes;
	protected $connection = 'mongodb';
	protected $collection = 'materis';
	protected $dates = ['deleted_at'];
	protected $fillabel = ['title','content','pelajaran_id','published', 'pengajar','order'];
	protected $guarded = [];
	
	public function pelajaran() {
		return $this->belongsTo('App\Pelajaran')->withDefault([
			'name' => 'Tidak masuk pada daftar Pelajaran '
		]);
	}
}
