@extends('layouts.app')

@section('titre')
  {{$post->titre}}
@endsection

@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-12">
          @include('posts.title-btns')
      </div>
      <p class="col-12 ml-2">{{$post->description}}</p>
      <hr class="col-12">
    </div>
    <br>
    <h2>{{$post->comments->count()}} Reponses : </h2>
    <hr>
    @foreach ($post->comments as $comment)
        @include('posts.comment')
    @endforeach
    @include('posts.post-a-comment')
  </div>



@endsection
