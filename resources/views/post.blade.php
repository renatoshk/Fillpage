@extends('layouts.blog-post')

@section('content')
<div class="row">
    <div class="col-md-8">
      <br>
<h1 style="color: red;">{{$post->title}}</h1>

                <!-- Author -->
                <p style="color: yellow; font-size: 18px" class="lead">
                    by {{$post->user->name}}
                </p>

                <br>

                <!-- Date/Time -->
                <p style="color: red"><span class="glyphicon glyphicon-time"></span>Posted {{$post->created_at->diffForHumans()}}</p>

                <br>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">

                <br>
                <!-- Post Content -->
                <span style="color:red">{!! $post->body !!}</span>

                 <br>
               
                <!-- Blog Comments -->
               
                <br>
                @if(Auth::user())
   <!-- Comments Form -->

                <div style="background-color: yellow" class="well">
                   
               {!!Form::open(['method'=>'POST', 'action'=>'PostsCommentController@store']) !!}
               <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div style="color:black" class="form-group">
                             {!!Form::label('text', 'Leave a Comment:')!!}
                             {!!Form::textarea('text', null, ['class'=>'form-control', 'rows'=>3])!!}
                        </div>
                        <div class="form-group">
                            {!!Form::submit('Create Comment ', ['class'=>'btn btn-primary'])!!}
                        </div>
                        {!!Form::close()!!}


                </div>
                   @endif
                <hr>

                <!-- Posted Comments -->
                @if(count($comments) > 0) 
                   @foreach($comments as $comment)


                <!-- Comment -->
                <div class="media">

                    <a class="pull-left" href="#">
                    <img height="64px" class="media-object" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 style="color: red" class="media-heading">{{$comment->author}}
                            <small style="color:yellow">{{$comment->created_at->diffForHumans()}}</small>
                        
                        </h4>
                        <p style="color: white">{{$comment->text}}</p>
                         <div class="comment-reply-container">      
                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                              <div style="display: none;" class="comment-reply">       
                                {!!Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                <br>
                                 <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    <div class="form-group">
                                         {!!Form::textarea('text', null, ['class'=>'form-control', 'rows'=>1])!!}
                                    </div>
                                    <div class="form-group">
                                        {!!Form::submit('reply', ['class'=>'btn btn-primary col-sm-6'])!!}
                                    </div>
                                {!!Form::close()!!}
                              </div>
                            </div>
                            @if(count($comment->replies) > 0)
                            @foreach($comment->replies as $reply)
                         

                        <div style="color:red; margin-top: 60px; " class="media col-sm-8">
                            <a class="pull-left" href="#">
                                <img height="64px" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                <small style="color:red">{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                
                                <p style="color:white">{{$reply->text}}</p>
                            </div>

                            <br>
                         <div class="comment-reply-container">      
                            <button class="toggle-reply btn btn-danger pull-right">Reply</button>
                              <div style="display: none;" class="comment-reply">       
                                {!!Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                <br>
                                 <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    <div class="form-group">
                                         {!!Form::textarea('text', null, ['class'=>'form-control', 'rows'=>1])!!}
                                    </div>
                                    <div class="form-group">
                                        {!!Form::submit('reply', ['class'=>'btn btn-danger col-sm-6'])!!}
                                    </div>
                                {!!Form::close()!!}
                              </div>
                </div>
                            </div>
 
            @endforeach
            @endif
                    </div>
                </div>
        @endforeach
    @endif
         </div>
         @section('categories')
         <ul class="list-unstyled">
            @if($categories)
              @foreach($categories as $category)
             <li>
                <a href="#">{{$category->name}}</a>
            </li>
            @endforeach
            @endif
        </ul>

         @stop



     </div>
                <!-- Comment -->
@stop
@section('scripts')
<script>
     $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");

     });
</script>
@stop