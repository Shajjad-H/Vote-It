@extends('layouts.app')

@section('titre')
  Profile - {{$profile->pseudo}}
@endsection

@section('content')
  <div class="container">
    <br>
    <div class="text-left">
      @include('welcome.profile', ['User' => $profile])
    </div>
    <br>
  </div>
@endsection