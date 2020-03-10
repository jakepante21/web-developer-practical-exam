<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function paintjobs()
	{
		return $this->hasMany('App\PaintJob');
	}
}
