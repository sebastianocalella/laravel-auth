@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        @if (session('message'))
            <div class="alert alert-danger">
                <p class="text-danger">
                    {{session('message')}}
                </p>
            </div>
        @endif
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">last modification</th>
                    <th scope="col">
                        <a class="btn btn-sm btn-primary w-100" href="{{route('admin.projects.create')}}">Create Post</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->author }}</td>
                        <td>{{ $project->modification_date }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('admin.projects.show', $project->slug)}}">Show</a>
                            <a class="btn btn-sm btn-success" href="{{route('admin.projects.edit', $project->slug)}}">Edit</a>
                            <form class="d-inline" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
@endsection