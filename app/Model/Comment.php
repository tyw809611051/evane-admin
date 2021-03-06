<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Comment extends Model
{
    //
    protected $table = 'comment';

    protected $fillable = [
        'content','parent_id','article_id','member_id'
    ];


    public function article()
    {
        return $this->hasOne('App\Model\Article','id','article_id');
    }

    public function member()
    {
        return $this->hasOne('App\Model\Member','id','member_id');
    }

    public function parent()
    {
        return $this->hasOne('App\Model\Comment','id','parent_id');
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
