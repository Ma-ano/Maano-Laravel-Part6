@extends('layout')

@section('title','This is Login Page')



@section('main')
<div class="main">
    <h1>User Login</h1>
    <form action="" method="post">
        <input type="text" placeholder="Enter Name">
        <br>
        <br>
        <input type="text" placeholder="Enter Password">
        <br>
        <br>
        <button type="button" class="btn btn-primary">Login</button> 
    </form>
</div>

@endsection