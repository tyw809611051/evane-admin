<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Member extends Model
{
    //
    protected $table = 'member';

    protected $fillable = [
        'name','password'
    ];

    
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
