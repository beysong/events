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

        BackendMenu::setContext('Beysong.Events', 'test', 'event');
    }
    
    public function index()
    {
        $this->asExtension('ListController')->index();
        $this->bodyClass = 'compact-container';
    }


    public function onCreateForm()
    {
        $this->asExtension('FormController')->create();
        return $this->makePartial('create_form');
    }

    public function onCreate()
    {
        $this->asExtension('FormController')->create_onSave();
        return $this->listRefresh('comments');
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
        return $this->listRefresh('comments');
    }

    public function onDelete()
    {
        $this->asExtension('FormController')->update_onDelete(post('record_id'));
        return $this->listRefresh('comments');
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