function loadProductData(el){
    let userId = $(el).data('user_id');
    let url =  "/product-data/"+userId
    axios.get(url).then(function (response) {
    	console.log(response)
        if(response.data){
            $("#append-user-data").html(response.data);
            $("#append-user-modal").modal("show");
        }

    })

}
