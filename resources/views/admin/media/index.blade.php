@extends('layouts.admin')
@section('content')
<h1>Media</h1>
@if($photos)
<table class="table" border="1" style="color: blue;">
    <thead>
      <tr style="color:red">
        <th>Id</th>
        <th>Image</th>
        <th>Created</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($photos as $photo)
      <tr style="color: white">
        <td>{{$photo->id}}</td>
        <td><img height="70px"src="{{$photo->file}}" alt=""></td>
        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No data'}}</td>
        <td>
        {!!Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]])!!}
       <div class="form-group">
             {!!Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6'])!!}
       </div>
             {!!Form::close()!!}
             {!!Form::close()!!}


        </td>
 
        @endforeach
    </tbody>
  </table>
   <div class="row"> 
                <div class="col sm-6 col-sm-offset-5">
                <ul  class="pager btn btn-danger">
                    {{$photos->links()}}
                    
                </ul>
            </div>
            </div> 
  @endif
@stop