@extends('layouts.app')

@section('titre')
    Forum
@endsection


@section('content')
  @include('components.centered-btn', [
    'route' => route('posts.create'),
    'text' => 'Posez une question'
  ])
  <div class="container"> 
    @foreach ($posts as $post)
      @include('posts.post')
    @endforeach
  </div>
@endsection