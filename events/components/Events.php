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
    	$event_id = $this->property('events');
    	$tickets = BeysongEvent::find($event_id)->tickets;
        return $tickets;
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
    	$events = BeysongEvent::where('end_time','>',time())->lists('name','id');
        return $events;
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {
    	$this->addCss('/plugins/beysong/events/assets/bootstrapvalidator/dist/css/bootstrapValidator.css');
    	$this->addJs('/plugins/beysong/events/assets/bootstrapvalidator/dist/js/bootstrapValidator.min.js');
    	$this->addJs('/plugins/beysong/events/assets/js/events.js');
    //	$event_id = $this->property('events');
    //	$tickets = BeysongEvent::find($event_id)->tickets;
    //	$this->page['tickets'] = $tickets;

    }

    public function onRegisterPersons()
    {	
    	$value1 = post('first_name',['1212']);
    	$this->page['result'] = $value1;
    	$this->page['result2'] = '2222';
    }


}