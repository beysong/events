<?php namespace Beysong\Events\Models;

use Model;

/**
 * Person Model
 */
class Order extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'beysong_orders';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    protected $dates = [];

    /**
     * @var array Rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'order_details' => ['Beysong\Events\Models\OrderDetail'],
    ];

}