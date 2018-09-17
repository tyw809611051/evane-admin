<?php

namespace App\Model;

use App\Library\LogRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\FeatureEvent;

class Feature extends Model
{
    use LogRecord;
    //
    protected $table = 'feature';

    protected $fillable = [
        'name',
        'desc',
        'status',
        'sort',
    ];
    //注册事件
//    protected $dispatchesEvents = [
//        'saving' => \App\Events\FeatureEvent::class,
//    ];
    
    //注入
    protected static function boot()
    {
        parent::boot();
        
        //创建前
         static::created (function ($model) {
             $model->dataStatus = '创建后';
             event(new FeatureEvent($model));// 触发事件
         });

        // 修改后
         static::updated(function($model){
             $model->dataStatus = '更新后';
             event(new FeatureEvent($model));// 触发事件
         });


        // 保存
//        static::saved(function ($model) {
//            $model->dataStatus = '保存后';
//
////            Log::info('model'.json_encode($model));
//            event(new FeatureEvent($model));// 触发事件
//        });

        // 保存
        static::deleted(function ($model) {
            $model->dataStatus = '删除后';
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
    
}
