<?php namespace Beysong\Events\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Orders [and OrderDetails] Back-end Controller
 *
 *
 */
class Orders extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_order_form.yaml';
    public $listConfig = ['orders' => 'config_orders_list.yaml', 'orderdetails' => 'config_orderdetails_list.yaml'];
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        if (post('order_mode'))
            $this->formConfig = 'config_orderdetail_form.yaml';

        parent::__construct();

        BackendMenu::setContext('Beysong.Events', 'events', 'orders');
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
        return $this->listRefresh('orderdetails');
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
        return $this->listRefresh('orderdetails');
    }

    public function onDelete()
    {
        $this->asExtension('FormController')->update_onDelete(post('record_id'));
        return $this->listRefresh('orderdetails');
    }

}