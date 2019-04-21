<div class="container">
  <form action="/groupe/abonner" method="POST">
    @csrf
    <div class="row">
      <div class="col-sm-7">
        <input type="text" placeholder="abonnez vous à un UE" class="form-control" name="abonnerAuGroupe" id="abonner-au-groupe" >
      </div>
      <div class="col-sm-1"><br></div>
      <div class="col-sm-2">
        <input type="submit" value="Abonner" class="form-control btn btn-success">
      </div>
    </div>
  </form>
  <br><br>
</div>

@section('js')
  @parent
  <script src="/TagsInput/dist/tagify.js"></script>
  <script src="/TagsInput/dist/jQuery.tagify.min.js"></script>
  <script src="/js/tagifyInputText.js"></script>
  <script>
    tagifyInputText('abonner-au-groupe', '{{route('groupe.index')}}/get/', (grp) =>  grp.nom);
  </script>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="/TagsInput/dist/tagify.css">
@endsection