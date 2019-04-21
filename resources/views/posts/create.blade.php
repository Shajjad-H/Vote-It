@extends('layouts.app')

@section('titre')
  Poser une question
@endsection


@section('content')
<br>
  <div class="container">
    @if (isset($post_created))
      @include('components.alert', [
          'type' => 'success',
          'text' => 'le post ' . $post->titre . ' a ete crée avec sucess'
      ])
    @endif

    <form method="POST" action="/posts">
      @csrf

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Titre : *</label>
        <div class="col-sm-10">
          <input name="titre" type="text" class="form-control" placeholder="titre de la question" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description : *</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description"  cols="30" rows="10" placeholder="desciption de la question" required></textarea>
        </div>
      </div>
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Groupe : *</label>
          <div class="col-sm-10">
              <input class="form-control" placeholder="Vous pouvez mettre plusieur UE" id="tag-groupe" required="required" name="groupe" type="text">
          </div>
        </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
          <input type="submit" class="form-control btn btn-success" value="Poster">
        </div>
      </div>

    </form>
  </div>
@endsection


@section('css')
    @parent
    <link rel="stylesheet" href="/TagsInput/dist/tagify.css">
@endsection

@section('js')
  @parent
  <script src="/TagsInput/dist/tagify.js"></script>
  <script src="/TagsInput/dist/jQuery.tagify.min.js"></script>
  <script src="/js/tagifyInputText.js"></script>
  <script>
    tagifyInputText('tag-groupe', '/groupe/get/', (grp) => grp.nom, 1);
  </script>
@endsection