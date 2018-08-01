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
        'title','picture','content','excerpt','author','users_id','tag','status','category_id'
    ];

    /*
    *分类
    */
    public function category()
    {
        return $this->hasOne('App\Model\Category','id','category_id');
    }
    
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
