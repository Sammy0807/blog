@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
                          <li class="list-group-item">
                            <a href='{{url("category/{$category->id}")}}'>{{$category->category}}</a>
                          </li>
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

                      @endforeach
                    @else
                    <strong>No Post Available</strong>
                    @endif
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
