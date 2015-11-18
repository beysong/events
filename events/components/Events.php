<?php namespace Beysong\Events\Components;

use Beysong\Events\Models\Event as BeysongEvent;

class Events extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Events',
            'description' => 'Displays a Event.'
        ];
    }

    // This array becomes available on the page as {{ component.posts }}
    public function events()
    {
        return ['First events', 'Second events', 'Third events'];
    }
    // This array becomes available on the page as {{ component.posts }}
    public function tickets()
    {
        return ['First tickets', 'Second tickets', 'Third tickets'];
    }
    //
    public function defineProperties()
    {
        return [
            'events' => [
                 'title'             => 'Available Events',
                 'description'       => 'All Available Events',
                 'type'              => 'dropdown'
            ]
        ];
    }

    public function getEventsOptions()
    {
        return ['1'=>'event1', '2'=>'event2'];
    }



}