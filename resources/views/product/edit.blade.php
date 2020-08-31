@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
@stop

@section('content')

 <div class="col-md-12  col-sm-6 col-xs-12">
         <!--  Form -->
         <div class="form-grid">
            <div class="heading-panel">
               <h3 class="main-title text-left">Create Category</h3>
            </div>
            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
               {{csrf_field()}}
               {{method_field('PUT')}}
               <div class="row">
                  <!-- category_type --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Product Name</label>
                        <input name="name" placeholder="product name" value="{{$product->name}}" class="form-control" type="text" required>
                     </div>
                  </div>
                  <!-- ad_link  --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Description</label>
                        <input name="description" value="{{$product->description}}" placeholder="description" class="form-control" type="text" required>
                     </div>
                  </div>
                 
               </div>
               <div class="row">
                  <!-- category_type --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Price</label>
                        <input name="price" value="{{$product->price}}" placeholder="price" class="form-control" type="number" required>
                     </div>
                  </div>
                  <!-- ad_link  --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Category Type</label>
                        <select name="category_id" class="form-control" required>
                        <option disabled="disabled" selected="selected">{{$product->category_id}}</option>
                          @foreach($category as $c)
                              <option value="{{$c['id']}}" >
                                  {{$c['name']}}
                              </option>
                          @endforeach
                      </select>
                     </div>
                  </div>
                   
               </div> 
               <div class="row">
                  <!-- category_type --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Price</label>
                        <input name="base_image" value="{{$product->base_image}}" placeholder="base image" class="form-control" type="text">
                     </div>
                  </div>
                  
               </div>               
                <input type="hidden" name="product_id" value="{{$product->id}}">
               <button class="btn btn-success">Update</button>
            </form>
         </div>
         <!-- Form -->
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop