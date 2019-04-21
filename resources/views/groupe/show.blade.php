@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
  <h5>{{$groupe->nom}}</h5>
  <div class="row">
    @include('votes.show-vote', ['votes' => $groupe->votes])
  </div>
</div>
@endsection