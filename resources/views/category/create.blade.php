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
            <form method="post" action="{{ route('categories.store') }}">
               @csrf
               <div class="row">
                  <!-- category_type --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Category Name</label>
                        <input name="name" placeholder="category name" class="form-control" type="text" required>
                     </div>
                  </div>
                  <!-- ad_link  --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Description</label>
                        <input name="description" placeholder="description" class="form-control" type="text" required>
                     </div>
                  </div>
                 
               </div>


               <button class="btn btn-success">Create</button>
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