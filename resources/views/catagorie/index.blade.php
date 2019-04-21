@extends('layouts.app')

@section('content')
  @if (Cas::auth())
      <h1>Is Auth</h1>
      {{Cas::pseudo()}}
  @else
      <h1>Not Auth</h1>
  @endif
@endsection