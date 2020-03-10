<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaintQueue extends Model
{
    public static function getpaintQueueData(){
	    $value=DB::table('paint_queues')->orderBy('id', 'asc')->get(); 
	    return $value;
	}
}
