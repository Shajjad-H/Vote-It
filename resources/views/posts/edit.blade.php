@extends('layouts.app')

@section('titre')
    Forum
@endsection

@section('content')
<br>
  <div class="container">

    <form method="POST" action="/posts/{{$post->id}}">
      @csrf
      @method('PUT')

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Titre : *</label>
        <div class="col-sm-10">
          <input name="titre" type="text" class="form-control" placeholder="titre de la question" value="{{$post->titre}}" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description : *</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description"  cols="30" rows="10" placeholder="desciption de la question" required>{{$post->description}}</textarea>
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
