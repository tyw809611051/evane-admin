<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\FeatureEvent;

class Feature extends Model
{
    //
    protected $table = 'feature';

    protected $fillable = [
        'name',
        'desc',
    ];

    //注入
    protected static function boot()
    {
        parent::boot();

        //创建前
        // static::creating(function ($model) {
        //     if(!$model->sn) {
        //         $model->sn = self::keyGen();
        //     }
        // });

        // 修改
        // static::updated(function($model){
        //     event(new TaskEvent($model));// 触发事件
        // });


        // 创建后
        static::created(function ($model) {
            event(new FeatureEvent($model));// 触发事件
        });
    }
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
