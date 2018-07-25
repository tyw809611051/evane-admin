<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    //
    protected $table = 'category';

    protected $fillable = [
        'name','feature_id','parent_id'
    ];

    /*
    *版块
    */
    public function feature()
    {
        return $this->belongsTo('App\Model\Feature');
    }
    public function addAll(array $data)
    {
    	try {
			$rs = DB::table($this->getTable())->insert($data);
    	} catch(Exception $e) {
    		Log::error('add-'.$this->getTable().': '.json_encode($data).'  reson: '.$e->getMessage());
    		return false;
    	}
    	
        return $rs;
    }
}