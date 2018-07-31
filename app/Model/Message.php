<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Message extends Model
{
    //
    protected $table = 'message';

    protected $fillable = [
        'title','content'
    ];

    /*
    *分类
    */
    public function users()
    {
        return $this->hasOne('App\User','id','users_id');
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
