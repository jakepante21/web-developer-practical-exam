<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaintJob extends Model
{
    public function status(){
    	return $this->belongsTo("App\Status");
    }

   	public static function getpaintJobData(){
	    $value=DB::table('paint_jobs')->orderBy('id', 'asc')->get(); 
	    return $value;
	}
}
