<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feature extends Model
{
    //
    protected $table = 'feature';

    protected $fillable = [
        'name','desc'
    ];

    public function addAll(array $data)
    {
    	$rs = DB::table($this->getTable())->insert($data);
        return $rs;
    }
}
