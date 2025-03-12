<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Pelajaran extends Model
{
	protected $connection = 'mongodb';
	protected $collection = 'pelajarans';
	protected $fillabel = ['name', 'gambar'];
	protected $guarded = array();
	
	public function materi() {
		return $this->hasMany('App\Materi');
	}
}
