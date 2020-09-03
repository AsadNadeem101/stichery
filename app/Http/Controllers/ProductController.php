<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\StoreAdRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\DataTables\ProductDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('product.index');
    }

    public function loadProductData($id){
        $product = Product::find($id);
        return view('product.product-data', compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $input=$request->all();
        
        if($request->hasFile('image'))
        {
            $input = $request->all();
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension(); 
            $image->move(public_path('product-images'), $imageName);
            
            $input['base_image'] = '/product-images/'.$imageName;
            Product::create($input);    
            return redirect('products');
        }


        return redirect('products');
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
        
        $product=Product::where('id',$id)->first();
        $product->category_id=Category::where('id',$product->category_id)->value('name');

        $category=Category::all();

        return view('product.edit',compact('category','product'));
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

        $product=Product::where('id',$id)->update([
            'name'        =>$request->name,
            'base_image'        =>$request->base_image,
            'description' =>$request->description,
            'price'       =>$request->price,
            'category_id' =>$request->category_id
        ]);

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $product=Product::where('id',$id)->delete();

        return redirect('products');

    }
    public function getDetails($id)
    {
        $product=Product::where('id',$id)->first();
        $product->category_id=Category::where('id',$product->category_id)->value('name');

        return $product;

    }
}
