<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = "order";
	protected $fillable = [
		'name',
		'price',
		'customer_id',
		'tailor_id',
		'status',
		'start_date',
		'end_date',
	];

}
