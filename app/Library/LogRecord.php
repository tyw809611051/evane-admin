<?php
/**
 * LogRecord.php
 * 记录增删改查到日志
 * 作者: Yiwen (devyiwen@163.com)
 * 创建日期: 2018/9/14 16:45
 * 修改记录:
 *
 *
 */
namespace App\Library;

use Illuminate\Support\Facades\Log;

trait LogRecord
{
    static $recordEvents=['updated'];
    
    public static function bootLogRecord()
    {
        foreach(static::getModelEvents() as $event)
        {
            static::$event(function ($model) {
               $model->setRemind();
            });
        }
        return true;
    }
    
    public static function getModelEvents()
    {
        if(isset(static::$recordEvents)) {
            return static::$recordEvents;
        }
        
//        return ['updated'];
    }
    
    /*
     * 记录到日志
     * */
    public function setRemind()
    {
        Log::info('测试');
        return true;
    }
}