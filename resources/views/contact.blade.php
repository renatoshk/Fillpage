@extends('layouts.blog-home')
@section('content')
{!!Form::open(['method'=>'POST']) !!}
<div class="form-group">
     {!!Form::label('name', 'Title:')!!}
     {!!Form::text('title', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
      {!!Form::label('Email', 'Email:')!!}
      {!!Form::text('email', null, ['class'=>'form-control'])!!} 
</div>
<div class="form-group">
     {!!Form::label('subject', 'Your Message:')!!}
     {!!Form::textarea('subject', null, ['class'=>'form-control', 'rows'=>6])!!}
</div>
<div class="form-group">
	{!!Form::submit('Submit', ['class'=>'btn btn-danger col-sm-12'])!!}
</div>
{!!Form::close()!!}
@stop