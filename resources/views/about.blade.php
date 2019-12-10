@extends('layouts.blog-home')
<style>
	.container-fluid {
    padding: 60px 50px;
  }
</style>
@section('content')
<h1 style="color: white; text-align: center">ABOUT US</h1>
<div class="container-fluid">
  <div class="row">
  	 <img style="height:500px; width:1100px; " src="{{url('/images/fill.jpg')}}" alt="Image"/>
    <div class="col-sm-8">
      <h2 style="color:white;">Hello Friend!</h2> 
       <h4 style="color:white;"> FILL YOUR BLANK PAGE WITH RIGHT INFORMATION!</h4>
      <p style="color:white">Fillpage is a website for educational purposes!
      	 We want to share together, posts or resources about schoolarships, online courses, books etc, where anyone can find right information! Helping each-other with 'gold' information, is a way to improve our skills!  
       </p>
      <button class="btn btn-primary btn-lg"><a href="/contact">Get in Touch</a></button>
    </div>
    <div class="col-sm-4">
     <img src="{{url('/images/logo.jpeg')}}" alt="Image"/>
    </div>
  </div>
</div>
@stop