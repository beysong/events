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

    /**
     * @var array Rules
     */
    public $rules = [
        'name' => 'required',
    ];

    /**
     * @var array Relations
     
    public $hasMany = [
        'comments' => ['October\Test\Models\Comment', 'scope' => 'isVisible'],
        'comments_count' => ['October\Test\Models\Comment', 'scope' => 'isVisible', 'count' => true]
    ];*/

}