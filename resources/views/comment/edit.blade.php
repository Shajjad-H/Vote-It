@extends('layouts.app')

@section('titre')
  Poser une question
@endsection

@section('content')
<div class="container mt-5">

  <form method="POST" action="/post/{{$post->id}}/comment/{{$comment->id}}">
    @csrf
    @method('PUT')
  
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Commentaire : *</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="comment"  cols="30" rows="10"  required>{{$comment->comment}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
        <input type="submit" class="form-control btn btn-success" value="Modifier">
      </div>
    </div>
  
  </form>
</div>
@endsection