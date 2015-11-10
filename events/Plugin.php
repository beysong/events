<?php namespace Beysong\Events;

use Backend;
use System\Classes\PluginBase;

/**
 * Events Plugin Information File
 */
class Plugin extends PluginBase
{
	
    /**
     * @var array Plugin dependencies
     */
    public $require = ['RainLab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Events',
            'description' => 'Events description ...',
            'author'      => 'Beysong',
            'icon'        => 'icon-leaf',
        ];
    }
    
	public function registerNavigation()
	{
	    return [
	        'events' => [
	            'label'       => 'Events',
	            'url'         => Backend::url('beysong/events/events'),
	            'icon'        => 'icon-pencil',
	            'order'       => 500,

	            'sideMenu' => [
	                'events' => [
	                    'label'       => 'Events',
	                    'icon'        => 'icon-copy',
	                    'url'         => Backend::url('beysong/events/events'),
	                ],
	                'tickets' => [
	                    'label'       => 'Tickets',
	                    'icon'        => 'icon-copy',
	                    'url'         => Backend::url('beysong/events/tickets'),
	                ],
	                'orders' => [
	                    'label'       => 'Orders',
	                    'icon'        => 'icon-copy',
	                    'url'         => Backend::url('beysong/events/orders'),
	                ]
	            ]
	        ]
	    ];
	}

}
