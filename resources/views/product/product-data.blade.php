<div class="row">
	<div  class="col-md-6 one-edge-shadow"> 
		<img class="img-responsive" style="width: 370px; height: 350px" src="{{$product['base_image']}}" alt="Lights">
	</div>	
	<div class="col-md-6 one-edge-shadow">
		<table class="table table-striped">
            <tbody>
              <tr>
                <td>Name</td>
                <td>{{$product['name']}}</td>
              </tr>                
              <tr>
                <td>Price</td>
                <td> {{$product['price']}}</td>
              </tr>
              <tr>
                <td>Description</td>
                <td> {{$product['description']}}</td>
              </tr>
              <tr>
              <tr>
                <td>Category</td>
                <td>{{App\Helpers\Helper::categoryIdToName($product['category_id'])}}</td>
              </tr>
              <tr>
                <td>Time</td>
                <td>{{$product['created_at']}}</td>
              </tr>              
            </tbody>
        </table>    		
		</div>		
</div>

<style type="text/css">
.one-edge-shadow {
	-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
}	
</style>
