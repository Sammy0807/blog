@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(session('response'))
            <div class="alert alert-primary">{{session('response')}}</div>
          @endif
            <div class="card">
                <div class="card-header">Post View</div>

                <div class="card-body row">
                      @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-4">
                      <ul class="list-group">
                        @if(count($categories)>0)
                          @foreach($categories->all() as $category)
                          <li class="list-group-item"><a href='{{url("/category/{$category->id}")}}'>
                            {{$category->category}}</a></li>
                          @endforeach
                        @else
                          <p>No Category Found!</p>
                        @endif
                    </ul>
                    </div>
                  <div class="col-md-8">
                    @if(count($posts)>0)
                     @foreach($posts->all() as $post)
                     <h4>{{$post->post_title}}</h4>
                     <img src="{{$post->post_image}}" alt="">
                      <p>{{$post->post_body}}</p>
                      <ul class="nav nav-pills">
                        <li role="presentation">
                          <a href='{{url("/like/{$post->id}")}}'>
                            <span class="fa fa-thumbs-up"> Like ({{$likeCtr}})</span>
                          </a>
                        </li>&nbsp;
                        <li role="presentation">
                          <a href='{{url("/dislike/{$post->id}")}}'>
                            <span class="fa fa-thumbs-down"> Dislike ({{$dislikeCtr}})</span>
                          </a>
                        </li>&nbsp;
                        <li role="presentation">
                          <a href='{{url("#")}}'>
                            <span class="fa fa-comment"> Comment</span>
                          </a>
                        </li>
                      </ul>
                      @endforeach
                    @else
                    <strong>No Post Available</strong>
                    @endif

                    <form method="POST" action='{{url("/comment/{$post->id}")}}'>
                      @csrf
                      <div class="form-group">
                        <textarea id="comment" class="form-control" name="comment" required autofocus></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Post Comment</button>
                      </div>
                    </form>

                    <h4>Comments</h4>
                    @if(count($comments)>0)
                      @foreach($comments->all() as $comment)
                      <div class="alert alert-success alert-block">
                    @if(Auth::id()==1)
                        <button type="button" class="close" data-dismiss="alert">x</button>
                      @endif
                      <p><h6>{{ $comment->comment }}</6></p>
                      <small class="float-right">Posted by: {{ $comment->name }}</small>
                      </div>
                      @endforeach
                    @else
                    <p><strong>Be the First to Comment</strong></p>
                    @endif
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
