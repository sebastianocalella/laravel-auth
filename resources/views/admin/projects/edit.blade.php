@extends('layouts.admin')

@section('content')
    @include('admin.partials.projectsCreateEdit', ['method' => 'PUT', 'routeName' => 'admin.posts.update'])
@endsection