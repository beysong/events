<?php namespace Beysong\Events\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Beysong\Events\Models\Event;

/**
 * People Back-end Controller
 */
class Events extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Beysong.Events', 'events', 'events');
    }
    

    public function formExtendModel($model)
    {
        /*
         * Init proxy field model if we are creating the model
         * and the context is proxy fields.
         */
        if ($this->action == 'create' && $this->formGetContext() == 'proxyfields') {
            $model->phone = new Phone;
        }

        return $model;
    }

}