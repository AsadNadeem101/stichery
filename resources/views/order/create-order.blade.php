@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

 <div class="col-md-12  col-sm-6 col-xs-12">
         <!--  Form -->
	 <div class="form-grid">
	    <div class="heading-panel">
	       <h3 class="main-title text-left">Create Order</h3>
	    </div>
	    <form method="post" action="{{ route('orders.store') }}">
	       @csrf
	       	<div class="row">	          	
	          	<input name="product_id"  type="hidden" value="{{$id}}">
                <input name="customer_id" type="hidden" value="{{Auth::user()->id}}">

                <input type="hidden" value="{{$start_date}}" name="start_date">
                <input type="hidden" value="{{$end_date}}" name="end_date">
				<input name="price" type="hidden" value="300">
	          	
	          	<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
		            <div class="form-group">
		                <label>Lenghth</label>
		                <input name="length" placeholder="lenghth in cm" class="form-control" type="number" required>
		            </div>
	          	</div>
	          	<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label>Size Type</label>
                        <select name="size" class="form-control" required>
                        <option value="XS"> XS</option>
                        <option value="S"> S</option>
                        <option value="M"> M</option>
                        <option value="L"> L</option>
                        <option value="XL"> XL</option>
                      </select>
                    </div>
                </div>
	         
	      	</div>

	      	    <div class="row">
			        @foreach(range(1, 1) as $key => $value)
			        @if(!($key % 4) and $key > 0) 
			        @endif
			    </div>
			    <div class="row">
			    @foreach($tailor as $t)           
			    <div class="col-md-3 sm-box">
			        <div style="border: 3px solid black">
			          <h3><i class="fas fa-user" aria-hidden="true"></i></h3>
			          <h2 style="font-size: 2.7vw">{{$t['name']}}</h2>
			          <input style="font-size: 20px" type="radio" name="tailor_id" value="{{$t['id']}}">
			        </div>
			    </div>
			            <br><br>
			        @endforeach
			        @endforeach
			    </div>
			    <button type="submit" class="btn btn-success">Create</button>
	    </form>
	 </div>         <!-- Form -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')

@stop