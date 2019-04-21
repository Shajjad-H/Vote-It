@php
  $user = Cas::user();    
@endphp

@if ($user->isAdmin() || $user->isTeacher())
<div class="container">
    @csrf
    <form class="from-group" action="/groupe" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-7">
          <input class="form-control" type="text" name="addGroupeName"  id="" placeholder="Vous pouver crée des groupes ex: l2-amal-a-2018" required>
          <br>
          <input type="text" id="tags-groupes-to-import" class="form-control" name="importPeople" placeholder="vous pouvez importer des élèves d'un UE déjà existant">
        </div>
        <span class="col-sm-1"></span>
        <br>
        <div class="col-sm-2">
          <input type="submit" value="Créer" class="form-control btn btn-success">
        </div>
      </div>
    </form>
</div>

@section('js')
  @parent
  <script src="/TagsInput/dist/tagify.js"></script>
  <script src="/TagsInput/dist/jQuery.tagify.min.js"></script>
  <script src="/js/tagifyInputText.js"></script>
  <script>
    tagifyInputText('tags-groupes-to-import', '{{route('groupe.index')}}/get/', (grp) =>  grp.nom);
  </script>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="/TagsInput/dist/tagify.css">
@endsection


@endif