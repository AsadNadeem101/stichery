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
use App\DataTables\OrderDataTable;
use App\DataTables\TailorOrdersDataTable;
use App\DataTables\CustomerOrdersDataTable;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TailorOrdersDataTable $dataTable)
    {
        return $dataTable->render('order.tailor-orders');
    }
    public function adminOrders(OrderDataTable $dataTable)
    {
        return $dataTable->render('order.admin-orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order= new Order;
            $order->price=$request['price'];
            $order->customer_id=$request['customer_id'];
            $order->tailor_id=$request['tailor_id'];
             $order->product_id=$request['product_id'];
            $order->length=$request['length'];
            $order->start_date=$request['start_date'];
            $order->end_date=$request['end_date'];
            $order->save();
            return redirect('/customer-orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updateStatus($id,$status)
    {
        if($status == 'recieved')
        {
            Order::where('id',$id)->update(['status'=>$status]);
            return redirect('/customer-orders');

        }
        else{
            Order::where('id',$id)->update(['status'=>$status]);
            return redirect('orders');            
        }



    }
    public function customerOrders(CustomerOrdersDataTable $dataTable)
    {
        return $dataTable->render('order.customer-orders');
    }
    public function manageOrder($id)
    {
        $start_date=Carbon::now()->format('Y-m-d');
        $end_date=Carbon::parse($start_date)->addDays(10)->format('Y-m-d');
        $tailor=User::where('type','tailor')->get();
        return view('order.create-order',compact('id','tailor','start_date','end_date'));
    }
}
