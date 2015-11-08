<?php namespace Beysong\Events\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Events [and Tickets] Back-end Controller
 *
 *
 */
class Events extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_event_form.yaml';
    public $listConfig = ['events' => 'config_events_list.yaml', 'tickets' => 'config_tickets_list.yaml'];
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        if (post('ticket_mode'))
            $this->formConfig = 'config_ticket_form.yaml';

        parent::__construct();

        BackendMenu::setContext('Beysong.Events', 'events', 'events');
    }

    public function index()
    {
        $this->asExtension('ListController')->index();
        $this->bodyClass = 'compact-container';
    }

    //
    // Comment form
    //

    public function onCreateForm()
    {
        $this->asExtension('FormController')->create();
        return $this->makePartial('create_form');
    }

    public function onCreate()
    {
        $this->asExtension('FormController')->create_onSave();
        return $this->listRefresh('tickets');
    }

    public function onUpdateForm()
    {
        $this->asExtension('FormController')->update(post('record_id'));
        $this->vars['recordId'] = post('record_id');
        return $this->makePartial('update_form');
    }

    public function onUpdate()
    {
        $this->asExtension('FormController')->update_onSave(post('record_id'));
        return $this->listRefresh('tickets');
    }

    public function onDelete()
    {
        $this->asExtension('FormController')->update_onDelete(post('record_id'));
        return $this->listRefresh('tickets');
    }

}