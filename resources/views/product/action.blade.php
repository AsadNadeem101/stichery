<!-- <a href="#" id="{{$id}}" onclick="detail(id);"><i class="fas fa-eye" style="color: darkblue"></i></a> -->
<a href="{{ route('products.edit',$id) }}"><i class="fas fa-pen" style="color: brown"></i></a>

<script type="text/javascript">
function detail (id)
{
	let url = "/product/"+id+"/detail"
	console.log(url)
	axios.get(url).then(function (response) {
		console.log(response)
	    Swal.fire({
	        title: '<strong>Product Details</strong>',
	        icon: 'info',
	        html:
	            '<b>Name</b></br>' + response.data.name+
	            '</br><b>Description</b></br>' + response.data.description+
	            '</br><b>Price</b></br>' + response.data.price+
	            '</br><b>Category</b></br>' + response.data.category_id,
	        showCloseButton: true,
	    })
	})

}		
</script>
