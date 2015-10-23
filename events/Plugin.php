<?php namespace Beysong\Events;

use App;
use Event;
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
    public $require = ['Rainlab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Events',
            'description' => 'No description provided yet...',
            'author'      => 'Beysong',
            'icon'        => 'icon-leaf',
            'homepage'        => 'http://'
        ];
    }
    
	public function registerNavigation()
	{
	    return [
	        'event' => [
	            'label'       => 'Events',
	            'url'         => Backend::url('beysong/events/events'),
	            'icon'        => 'icon-pencil',
	            'permissions' => ['acme.blog.*'],
	            'order'       => 500,

	            'sideMenu' => [
	                'event' => [
	                    'label'       => 'Events',
	                    'icon'        => 'icon-copy',
	                    'url'         => Backend::url('beysong/events/events'),
	                    'permissions' => ['acme.blog.access_posts']
	                ],
	                'categories' => [
	                    'label'       => 'Categories',
	                    'icon'        => 'icon-copy',
	                    'url'         => Backend::url('acme/blog/categories'),
	                    'permissions' => ['acme.blog.access_categories']
	                ]
	            ]
	        ]
	    ];
	}

}
