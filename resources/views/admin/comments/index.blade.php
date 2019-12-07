@extends('layouts.admin')
@section('content')
<h1>Comments</h1>
@if(count($comments) > 0)
<table class="table" border="1" style="color: blue;">
    <thead>
      <tr style="color:red">
        <th>Id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Content</th>
        <th>Posts</th>
        <th>Replies</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($comments as $comment)
      <tr style="color: white">
      	<td>{{$comment->id}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->text}}</td> 
        <td><a href="{{route('home.post', $comment->post_id)}}">View Post</a></td>
        <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>  
        <td>{{$comment->created_at ? $comment->created_at->diffForHumans() : 'No data'}}</td>
       <td>
    @if($comment->is_active ==1)
        {!!Form::open(['method'=>'PATCH','action'=>['PostsCommentController@update',$comment->id    ]]) !!}
                      <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!!Form::submit('Unnapprove ', ['class'=>'btn btn-warning'])!!}
                        </div>
        {!!Form::close()!!}

      @else
        {!!Form::open(['method'=>'PATCH','action'=>['PostsCommentController@update',$comment->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!!Form::submit('Approve ', ['class'=>'btn btn-success'])!!}
                        </div>
          {!!Form::close()!!}
    @endif
      </td>
      <td>
    	{!!Form::open(['method'=>'DELETE','action'=>['PostsCommentController@destroy',$comment->id]]) !!}
                    <div class="form-group">
                        {!!Form::submit('DELETE ', ['class'=>'btn btn-danger'])!!}
                    </div>
        {!!Form::close()!!}



        </td>

      </tr>
        @endforeach
    </tbody>
  </table>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">
      {{$comments->render()}}
    </div>
  </div>
  @endif
@stop