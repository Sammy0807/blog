@extends('layouts.app')
<style type="text/css">
  .avatar{
    border-radius: 100%;
    max-width: 100px;
  }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(session('response'))
            <div class="alert alert-primary">{{session('response')}}</div>
          @endif
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-4">DashBoard</div>
                    <div class="col-md-8">
                      <form method="POST" action='{{url("/search")}}'>
                        @csrf
                        <div class="input-group">
                          <input type="text" name="search" class="form-control"
                          placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                          </span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="card-body row">

                      @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-4">
                      @if(!empty($profile))
                      <img src="{{ $profile->profile_pic }}"
                      alt=""
                      class="avatar">
                      @else
                      <img src="{{ url('/images/received_1891538774193100.png') }}"
                      alt=""
                      class="avatar">
                      @endif

                      @if(!empty($profile))
                      <p class="lead">{{ $profile->name }}</p>
                      @else
                      <p></p>
                      @endif

                      @if(!empty($profile))
                      <p class="lead">{{ $profile->designation }}</p>
                      @else
                      <p></p>
                      @endif

                    </div>
                  <div class="col-md-8">
                    @if(count($posts)>0)
                     @foreach($posts->all() as $post)
                     <h4>{{$post->post_title}}</h4>
                     <img src="{{$post->post_image}}" alt="">
                      <p>{{substr($post->post_body, 0, 150)}}</p>
                      <ul class="nav nav-pills">
                        <li role="presentation">
                          <a href='{{url("/view/$post->id")}}'>
                            <span class="fa fa-eye"> view</span>
                          </a>
                        </li>&nbsp;
                        <li role="presentation">
                          <a href='{{url("/edit/$post->id")}}'>
                            <span class="fa fa-edit"> Edit</span>
                          </a>
                        </li>&nbsp;
                        <li role="presentation">
                          <a href='{{url("/delete/$post->id")}}'>
                            <span class="fa fa-trash"> Delete</span>
                          </a>
                        </li>
                      </ul>
                      <cite style="">Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                      <hr/>

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
@endsection
