<?php

namespace App\Model;

use App\Library\LogRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\FeatureEvent;

class Menu extends Model
{
    use LogRecord;
    //
    protected $table = 'system_menu';

    protected $fillable = [
        'pid',
        'title',
        'icon',
        'href',
        'target',
        'sort',
        'status',
        'remark',
    ];
    //注册事件
//    protected $dispatchesEvents = [
//        'saving' => \App\Events\FeatureEvent::class,
//    ];
    
    //注入
    protected static function boot()
    {
        parent::boot();
    }

    
}
