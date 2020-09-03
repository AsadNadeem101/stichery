@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Order</h1>
@stop

@section('content')
    {{$dataTable->table()}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{$dataTable->scripts()}}
@stop