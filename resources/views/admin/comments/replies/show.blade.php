@extends('layouts.admin')
@section('content')
<h1>Replies</h1>
@if(count($replies) > 0)
<table class="table" border="1" style="color: blue;">
    <thead>
      <tr style="color:red">
        <th>Id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Content</th>
        <th>Posts</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($replies as $reply)
      <tr style="color: white">
      	<td>{{$reply->id}}</td>
        <td>{{$reply->author}}</td>
        <td>{{$reply->email}}</td>
        <td>{{$reply->text}}</td> 
        <td><a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></td> 
        <td>{{$reply->created_at ? $reply->created_at->diffForHumans() : 'No data'}}</td>
       <td>
    @if($reply->is_active ==1)
        {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id    ]]) !!}
                      <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!!Form::submit('Unnapprove ', ['class'=>'btn btn-warning'])!!}
                        </div>
        {!!Form::close()!!}

      @else
        {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!!Form::submit('Approve ', ['class'=>'btn btn-success'])!!}
                        </div>
          {!!Form::close()!!}
    @endif
      </td>
      <td>
    	{!!Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                    <div class="form-group">
                        {!!Form::submit('DELETE ', ['class'=>'btn btn-danger'])!!}
                    </div>
        {!!Form::close()!!}



        </td>

      </tr>
        @endforeach
    </tbody>
  </table>
  @endif
@stop