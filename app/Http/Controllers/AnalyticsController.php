<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\StoreAdRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
    	$order=Order::count();
    	$customer=User::where('type','customer')->count();
    	$tailor=User::where('type','tailor')->count();
    	$price=Order::sum('price');

    	$customer_order=Order::where('customer_id',Auth::user()->id)->get();  	

    	$customer_order_count=DB::table('order')
    					->join('users','order.customer_id','users.id')
    					->where('users.id',Auth::user()->id)
    					->where('users.type','customer')
    					->count();

    	$customer_spent=DB::table('order')
    					->join('users','order.customer_id','users.id')
    					->where('users.id',Auth::user()->id)
    					->where('users.type','customer')
    					->sum('price');						

    	$data = array('order' =>$order ,'customer' =>$customer,'tailor'=>$tailor,'price'=>$price);
    	return view('analytics.index',compact('data','customer_order_count','customer_spent','customer_order'));
    }
}
