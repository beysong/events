<?php namespace Beysong\Events\Models;

use Model;

/**
 * Post Model
 */
class OrderDetail extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'beysong_order_details';

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
        'name' => 'required',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'order' => ['Beysong\Events\Models\Order']
    ];

}