@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <form class="text-white bg-dark py-3 px-4" action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <h3>Author: {{Auth::user()->name}}</h3>
            <div class="form-group col-8">
                <label for="post-title" class="form-label">post title:</label>
                <input type="text" class="form-control" id="post-title" placeholder="insert post title here" name="title">
            </div>
            <div class="form-group">
                <label for="post-content">Address 2</label>
                <textarea type="text" class="form-control" id="text-content" placeholder="Once upon a time..." name="content">
                </textarea>
            </div>
            <h4>date: {{now()->format('Y-m-d')}}</h4>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
