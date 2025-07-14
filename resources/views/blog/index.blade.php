@extends('blog.app')

@section('title', 'Blog App')

@section('content')

@include('blog.layout.navbar')  
@include('blog.layout.header')
@include('blog.layout.blogpost')
@include('blog.layout.footer')

@endsection
