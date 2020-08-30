<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name',
		'base_image',
		'price',
		'description',
		'category_id'
	];

    public $table = "product";
}
