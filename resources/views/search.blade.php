@extends('layouts.blog-home')
@section('content')
<div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <br>
                @if($posts)
                  @foreach($posts as $post)
                <!-- First Blog Post -->

                <h2>
                    <a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a>
                </h2>
                <p style="color: white; font-size: 18px;" class="lead">
                    by {{$post->user->name}}
                </p>
                <p style="color:red"><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
                <br>
                <img class="img-responsive" style="width: 750px;" src="{{$post->photo->file}}" alt="">
                <br>
                <span style="color:white">{!!str_limit($post->body), 100!!}</span>
                <br>
                <br>
                <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><hr>

            
                  @endforeach
               @endif

                <!-- Pagination -->
            <div class="row"> 
                <div class="col sm-6 col-sm-offset-5">
                <ul class="pager ">
                  {{$posts->links()}}
                    
                </ul>
            </div>
            </div>        

            </div>
            <br>
            <br>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @if($categories)
                                @foreach($categories as $category)
                                <li><a href="{{route('home.category', $category->id)}}">{{$categories->name}}</a>
                                </li>
                                 @endforeach
                                @endif
                            </ul>
                        </div>
                 
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
@stop