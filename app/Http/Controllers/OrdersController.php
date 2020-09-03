<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\StoreAdRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
