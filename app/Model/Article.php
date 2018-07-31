<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Article extends Model
{
    //
    protected $table = 'article';

    protected $fillable = [
        'title','picture','content','excerpt','author'
    ];

    /*
    *分类
    */
    public function category()
    {
        return $this->hasMany('App\Model\Category');
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
