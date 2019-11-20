@extends('layouts.admin')
@section('content')
<h1>Users</h1>
 <table class="table" border="1" style="color: blue;">
    <thead>
      <tr style="color:red">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($users)
    	 @foreach($users as $user)
      <tr style="color: white">
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'active' : 'No active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>

@stop