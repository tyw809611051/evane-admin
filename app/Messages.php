<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Messages extends Model
{
    use Notifiable;
    //
    protected $fillable = [
        'from', 'to', 'message'
    ];
}
