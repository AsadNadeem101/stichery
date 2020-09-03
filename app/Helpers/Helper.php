<?php

namespace App\Helpers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use App\User;
use App\Models\Category;


class Helper
{

    public static function userIdToName($id)
    {
        $name = User::where('id',$id)->value('name');
        return $name;
    }

	public static function categoryIdToName($id)
    {
        $name = Category::where('id',$id)->value('name');
        return $name;
    }


}

