@extends('layouts.admin')


@section('content')
<h1>Categories</h1>
@include('includes.form_error')
<div class="col-sm-6">
{!!Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
<div class="form-group">
     {!!Form::label('name', 'Name:')!!}
     {!!Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::submit('Create Category ', ['class'=>'btn btn-primary col-sm-6'])!!}
</div>
{!!Form::close()!!}

</div>
<div class="col-sm-6">
	<table class="table" border="1" style="color: blue;">
    <thead>
      <tr style="color:red">
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($categories)
      	@foreach($categories as $category)
      <tr style="color: white">
      	<td>{{$category->id}}</td>
        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No data'}}</td>
        <td>{{$category->updated_at ? $category->updated_at->diffForHUmans() : 'No data'}}</td> 
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>	

</div>

@stop