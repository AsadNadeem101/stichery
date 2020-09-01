@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer</h1>
@stop

@section('content')
    {{$dataTable->table()}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
 <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>

     <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
{{$dataTable->scripts()}}
<script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        $(document).ready(function (){

            window.LaravelDataTables["customer-table"].on('draw', function(){
                /*$(".switch").bootstrapSwitch({
                    size: 'mini',
                    onColor: 'success',
                    offColor: 'danger'
                });
                $('.bootstrap-switch-container').css('width','100px');*/

                $('.bt-toggle').bootstrapToggle();

            });
        })

        // send user's status update request
        function updateUserStatus(el){

            let id      = $(el).data('id');
           

            let status;

            if($(el).is(':checked')) {
                status = 'active';
            } else{
                status = 'deactivate';
            }

            if(id > 0){
                let url =  "/user/update-status"
                console.log(id)
                console.log(status)
                axios.post(url,{id: id, status: status})
                    .then(function(response){
                    	console.log(response.data)
                        // if(response.data.error){
                        //     swal.fire({
                        //         text: "Oops! Something went wrong",
                        //         icon: "error",
                        //     });
                        // }else{
                        //     swal.fire({
                        //         text: "status updated successfully",
                        //         icon: "success",
                        //     });
                        // }
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            }
        }
    </script>
@stop