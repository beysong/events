<?php namespace Beysong\Events\Components;

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
}