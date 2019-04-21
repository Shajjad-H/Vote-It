@extends('layouts.app')

@section('titre')
    Votes
@endsection

@section('content')
  <div class="container mt-3 mb-3">
    {!! form($form) !!}
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
    tagifyInputText('tag-people', '/user/get/', (user) =>  user.ps_fname);
    tagifyInputText('tag-groupes', '/groupe/get/', (grp) => grp.nom);
  </script>
@endsection