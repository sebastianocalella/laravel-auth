@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">post date</th>
                    <th scope="col">
                        <a class="btn btn-sm btn-primary w-100" href="{{route('admin.posts.create')}}">Create Post</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('admin.posts.show',$post->id)}}">Show</a>
                            <a class="btn btn-sm btn-success" href="">Edit</a>
                            <a class="btn btn-sm btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection




