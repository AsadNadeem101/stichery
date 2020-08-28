@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')

	<div class="container">
		<div class="row">
			<a href="{{ route('category.create') }}">
				<button class="btn btn-success">Create Category</button>
			</a>
		</div>
		
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop