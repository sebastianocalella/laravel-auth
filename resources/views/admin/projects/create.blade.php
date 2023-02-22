@extends('layouts.admin')

@section('content')
    @include('admin.partials.projectsCreateEdit', ['method' => 'POST', 'routeName' => 'admin.posts.store'])
@endsection