<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = "order";
	protected $fillable = [
		'name',
		'price',
		'product_id',
		'size',
		'length',
		'customer_id',
		'tailor_id',
		'status',
		'start_date',
		'end_date',
	];

}
