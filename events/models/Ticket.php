<?php namespace Beysong\Events\Models;

use Model;

/**
 * Post Model
 */
class Ticket extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'beysong_tickets';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    protected $dates = ['start_time','end_time'];
    
    /**
     * @var array Rules
     */
    public $rules = [
        'name' => 'required',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'event' => ['Beysong\Events\Models\Event']
    ];

}