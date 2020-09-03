@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
@stop

@section('content')

<div class="container-fluid">
  {{--<div class="row">
    <div class="col-md-12">
      <div class="page">        
        <h1 style="color: white">@lang('language.Analytics')</h1>
          <div class="row">
            <div class="col-md-12 hvr-grow">
                <div style="background-image: linear-gradient(to top, #dfe9f3 0%, white 100%); border: 2px solid #85abd0; box-shadow: 7px 9px 5px #85abd0; border-radius: 8px;height:300px;">
                    @if(empty($line_chart))
                     <p> NO Data</p>
                    @else    
                    {!! $line_chart->container() !!}
                    @endif
                </div>   
            </div>             
          </div>  
        <br />               
        <div class="archive">
          <div class="row">
            <div class="col-md-4 hvr-grow ">
                <div style="background-image: linear-gradient(to top, #dfe9f3 0%, white 100%); border: 2px solid #85abd0; box-shadow: 7px 9px 5px #85abd0; border-radius: 8px;height:250px;">
                    @if(empty($horizontal_bar_chart))
                     <p> NO Data</p>
                    @else    
                    {!! $horizontal_bar_chart->container() !!}
                    @endif
                </div>   
            </div>
            <div class="col-md-4 hvr-grow">
                <div style="background-image: linear-gradient(to top, #dfe9f3 0%, white 100%); border: 2px solid #85abd0; box-shadow: 7px 9px 5px #85abd0; border-radius: 8px;height:250px;">
                    @if(empty($pie_chart))
                     <p> NO Data</p>
                    @else    
                    {!! $pie_chart->container() !!}
                    @endif
                </div>   
            </div>
            <div class="col-md-4 hvr-grow ">
                <div style="background-image: linear-gradient(to top, #dfe9f3 0%, white 100%); border: 2px solid #85abd0; box-shadow: 7px 9px 5px #85abd0; border-radius: 8px;height:250px;">
                    @if(empty($bar_chart))
                     <p> NO Data</p>
                    @else    
                    {!! $bar_chart->container() !!}
                    @endif
                </div>   
            </div>                        
          </div>                      
        </div>
      </div>      
    </div>
  </div>--}}
  @if(Auth::user()->type=='customer')
  <div class="row">
  	<div class="col-md-12">
  		<h2>Orders Detail</h2>
		<table class="table table-striped">
        	<thead>
        		<th>Tailor Name</th>
        		<th>Price</th>
        		<th>Status</th>
        		<th>Start Date</th>
        		<th>End Date</th>
        	</thead>
            <tbody>
            @foreach($customer_order as $o)	
              <tr>
                <td>{{App\Helpers\Helper::userIdToName($o['tailor_id'])}}</td>
                <td>{{$o['price']}}</td>
                @if($o['status'] =='cancelled')
                <td class=" badge bg-danger">{{$o['status']}}</td>
                @elseif($o['status'] =='pending')
                <td class=" badge bg-warning">{{$o['status']}}</td>
                @elseif($o['status'] =='accepted')
                <td class=" badge bg-success">{{$o['status']}}</td>
                @elseif($o['status'] =='in-progress')
                <td class=" badge bg-secondary">{{$o['status']}}</td>
                @elseif($o['status'] =='dispatched')
                <td class=" badge bg-primary">{{$o['status']}}</td>
                @elseif($o['status'] =='recieved')
                <td class=" badge bg-info">{{$o['status']}}</td>
                @endif
                <td>{{$o['start_date']}}</td>
                <td>{{$o['end_date']}}</td>
              </tr>
            @endforeach                     
            </tbody>
        </table>	  		
  	</div>
  	
  </div>
 @elseif(Auth::user()->type=='tailor')
 	<div class="row">
  	<div class="col-md-12">
  		<h2>Orders Detail</h2>
		<table class="table table-striped">
        	<thead>
        		<th>Customer Name</th>
        		<th>Price</th>
        		<th>Status</th>
        		<th>Start Date</th>
        		<th>End Date</th>
        	</thead>
            <tbody>
            @foreach($tailor_order as $o)	
              <tr>
                <td>{{App\Helpers\Helper::userIdToName($o['customer_id'])}}</td>
                <td>{{$o['price']}}</td>
                @if($o['status'] =='cancelled')
                <td class=" badge bg-danger">{{$o['status']}}</td>
                @elseif($o['status'] =='pending')
                <td class=" badge bg-warning">{{$o['status']}}</td>
                @elseif($o['status'] =='accepted')
                <td class=" badge bg-success">{{$o['status']}}</td>
                @elseif($o['status'] =='in-progress')
                <td class=" badge bg-secondary">{{$o['status']}}</td>
                @elseif($o['status'] =='dispatched')
                <td class=" badge bg-primary">{{$o['status']}}</td>
                @elseif($o['status'] =='recieved')
                <td class=" badge bg-info">{{$o['status']}}</td>
                @endif
                <td>{{$o['start_date']}}</td>
                <td>{{$o['end_date']}}</td>
              </tr>
            @endforeach                     
            </tbody>
        </table>	  		
  	</div>
  	
  </div>
 @endif 
  <div class="row">
    <div class="col-md-12">
      <div class="page color_4 align">
        <h1 style="color: white">Stats</h1>
        <div class="archive">

        @if(Auth::user()->type=='customer')
        <article style=" margin-left: 10px; border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
          	<a href="/customer-orders">	
	            <h1 style="color: #212529; font-weight: bold;font-size: 25px">Total Orders</h1>
	            <div class="row">
	              <div class="col-md-12">
	                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
	                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$customer_order_count}}&nbsp;<i class="fas fa-info-circle" style="color:#1f3e63;font-size: 30px;"></i></h1>
	                </div>
	              </div>
	            </div>  
           	</a>      
        </article>
        <article style="margin-left: 10px; border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
          	<a href="/customer-orders">	
	            <h1 style="color: #212529; font-weight: bold;font-size: 25px">Total Spent</h1>
	            <div class="row">
	              <div class="col-md-12">
	                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
	                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$customer_spent}}-/Rs&nbsp;<i class="fas fa-info-circle" style="color:#1f3e63;font-size: 30px;"></i></h1>
	                </div>
	              </div>
	            </div>  
           	</a>      
        </article>

        @elseif(Auth::user()->type=='tailor')
        <article style=" margin-left: 10px; border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
          	<a href="/orders">	
	            <h1 style="color: #212529; font-weight: bold;font-size: 25px">Total Orders</h1>
	            <div class="row">
	              <div class="col-md-12">
	                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
	                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$tailor_order_count}}&nbsp;<i class="fas fa-info-circle" style="color:#1f3e63;font-size: 30px;"></i></h1>
	                </div>
	              </div>
	            </div>  
           	</a>      
        </article>
        <article style="margin-left: 10px; border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
          	<a href="/orders">	
	            <h1 style="color: #212529; font-weight: bold;font-size: 25px">Total Earnings</h1>
	            <div class="row">
	              <div class="col-md-12">
	                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
	                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$tailor_spent}}-/Rs&nbsp;<i class="fas fa-info-circle" style="color:#1f3e63;font-size: 30px;"></i></h1>
	                </div>
	              </div>
	            </div>  
           	</a>      
        </article>

		@elseif(Auth::user()->type == 'super_admin')	       	
          <article style="margin-left: 10px; border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
          <a href="/user-customer">	
            <h1 style="color: #212529; font-weight: bold;font-size: 25px">Total Customers</h1>
            <div class="row">
              <div class="col-md-12">
                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$data['customer']}}&nbsp;<i class="fas fa-info-circle" style="color:#1f3e63;font-size: 30px;"></i></h1>
                </div>
              </div>
            </div>  
           </a>      
          </article>
        
          <article  style="margin-left: 10px; border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
          	<a href="/user-tailor">
            <h1 style="color: #212529;font-weight: bold;font-size: 25px">Total Tailors</h1>
            <div class="row">
              <div class="col-md-12">
                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$data['tailor']}}&nbsp;<i class="fas fa-info-circle" style="color:#1f3e63;font-size: 30px;"></i></h1>
                </div>
              </div>
            </div>    
            </a>   
          </article>
        
          <article  style="margin-left: 10px; border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
          	<a href="/all-orders">
            <h1 style="color: #212529;font-weight: bold;font-size: 25px">Total Orders</h1>
            <div class="row">
              <div class="col-md-12">
                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$data['order']}}&nbsp;<i class="fas fa-info-circle" style="color:#1f3e63;font-size: 30px;"></i></h1>
                </div>
              </div>
            </div>  
            </a>      
          </article>  
          <article  style=" margin-left: 10px;border-radius: 2rem;box-shadow: 7px 9px 5px #85abd0;" class="article  hvr-grow">
            <h1 style="font-weight: bold;font-size: 25px">Total Revenue</h1>
            <div class="row">
              <div class="col-md-12">
                <div style="background-color: #cecece; height: 100px;border-radius: 2rem;">
                  <h1 style=" color: black; text-align: center;padding-top: 30px;">{{$data['price']}}-/Rs</h1>
                </div>
              </div>
            </div>       
          </article> 
        @endif                         
        </div>

      </div>      
    </div>

  </div>
  <br />


</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style type="text/css">
	    .page {
	  padding: 2em;
	 background-color: #343a40;
	  max-width: 1100px;
	  margin-top: 60px;
	  margin-left: 30px;
	  border-radius: 2rem;
	  box-shadow: 7px 9px 5px #272d47;
	}

	.archive {
	  display: grid;
	  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
	  grid-gap: 1em;
	  margin-top: 40px;
	  border-radius: 2rem;
	}

	.article {
	  padding: 1em;

	    background-image: linear-gradient(to top, #dfe9f3 0%, white 100%);
	    border-radius: 2rem;
	 /*  -webkit-box-shadow:0 0 20px #1d3d61;*/
	}



	/* Grow */
	.hvr-grow {
	    display: inline-block;
	    vertical-align: middle;
	    transform: translateZ(0);
	    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	    backface-visibility: hidden;
	    -moz-osx-font-smoothing: grayscale;
	    transition-duration: 0.3s;
	    transition-property: transform;
	}

	.hvr-grow:hover,
	.hvr-grow:focus,
	.hvr-grow:active {
	    transform: scale(1.1);
	}	
    </style>
@stop

@section('js')

@stop