@extends('layouts.admin')
@section('content')

<h1>Posts</h1>
 <table class="table" border="1" style="color: blue;">
    <thead>
      <tr style="color:red">
        <th>Id</th>
        <th>Photo</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($posts)
    	 @foreach($posts as $post)
      <tr style="color: white">
        <td>{{$post->id}}</td>
        <td><img height="100" src="{{$post->photo ? $post->photo->file : 'No photo available'}}" alt=""></td>
        <td>{{$post->user->name}}</a></td>
        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
@stop