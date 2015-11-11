<?php namespace Beysong\Events\Models;
	
use Model;
		
class BeysongEventsSettings extends Model{
	
    public $implement = ['System.Behaviors.SettingsModel'];
    
    public $settingsCode = 'beysong_events_alipay_code';

    public $settingsFields = 'fields.yaml';
    
}