@extends('layouts.app')

@section('content')
    <div class="container my-5">
        @foreach ($posts as $post)
            <div class="card my-3 text-white bg-dark text-center">
                <div class="card-header">
                    {{$post->author}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->id}} {{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">posts list</a>
                </div>
                <div class="card-footer text-muted">
                    {{$post->post_date}}
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    </div>
@endsection