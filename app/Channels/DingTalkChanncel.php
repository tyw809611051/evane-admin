<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use App\Library\Dingding;
class DingTalkChanncel
{
    
    public function send($notifiable,Notification $notification)
    {
        $message = $notification->toDingTalk($notifiable);
    }
}