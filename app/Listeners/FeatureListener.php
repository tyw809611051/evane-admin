<?php

namespace App\Listeners;

use App\Events\FeatureEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeatureListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FeatureEvent  $event
     * @return void
     */
    public function handle(FeatureEvent $event)
    {
        info('feature tangyiwen');
    }
}
