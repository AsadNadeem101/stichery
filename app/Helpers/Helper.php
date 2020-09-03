<?php

namespace App\Helpers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use App\User;


class Helper
{

    public static function userIdToName($id)
    {
        $name = User::where('id',$id)->value('name');
        return $name;
    }


}

