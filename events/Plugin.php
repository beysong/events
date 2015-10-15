<?php namespace Beysong\Events;

use System\Classes\PluginBase;

/**
 * Events Plugin Information File
 */
class Plugin extends PluginBase
{

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
            'icon'        => 'icon-leaf'
        ];
    }

}
