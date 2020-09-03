@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Prodcut</h1>
@stop

@section('content')
   <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #append-user-modal{ z-index: 9999 !important; }
    </style>
    <div  class="modal fade" id="append-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div style="border-radius: 60px" class="modal-content">
                <div class="modal-header">
                    <img src="vendor/adminlte/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3">
                    <h3  style="margin-top: 50px; margin-left: 15px" class="modal-title" id="exampleModalLongTitle">Stichery Product Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="row">
                        <div class="col-md-12" id="append-user-data" ></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style type="text/css">
        .form-inline {
            display: block
        }
    </style>
@stop

@section('js')
<script src="{{ asset('js/load-admin-product-data.js') }}"></script>
{{$dataTable->scripts()}}
@stop