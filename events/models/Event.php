<?php namespace Beysong\Events\Models;

use Model;

/**
 * Person Model
 */
class Event extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'beysong_events';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Rules
     */
    public $rules = [
        'name' => 'required',
    ];

    public $hasMany = [
        'tickets' => ['Beysong\Events\Models\Ticket', 'scope' => 'isVisible'],
        'orders' => ['Beysong\Events\Models\Order', 'scope' => 'isVisible'],
    ];
    /**
     * @var array Relations
     
    public $hasOne = [
        'phone' => ['October\Test\Models\Phone', 'key' => 'person_id', 'scope' => 'isActive'],
        'alt_phone' => ['October\Test\Models\Phone', 'key' => 'person_id']
    ];*/

}