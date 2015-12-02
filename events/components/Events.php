<?php namespace Beysong\Events\Components;

use Beysong\Events\Models\Event as BeysongEvent;
use Beysong\Events\Models\Order as Order;
use Beysong\Events\Models\OrderDetail as OrderDetail;
use Beysong\Events\Models\Ticket as Ticket;

class Events extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Events',
            'description' => 'Displays a Event.'
        ];
    }

    //Now event id
    public function event_id()
    {
        return $this->property('events');
    }

    // Tickets of current event
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
    	$first_name = post('first_name');
        $last_name = post('last_name');
        $company = post('company');
        $title = post('title');
        $mobile = post('mobile');
        $email = post('email');
        $tickets = post('tickets');
        $first_name = post('first_name');

        $event_id = post('event_id');
        $user_id = post('user_id');
        $this->page['result'] = array('1','42','124');
		//return array('result'=>124);

    }


}