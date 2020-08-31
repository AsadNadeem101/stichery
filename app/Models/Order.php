<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = "category";
	protected $fillable = [
		'name',
		'price',
		'customer_id',
		'tailor_id',
		'start_date',
		'end_date',
	];

}
