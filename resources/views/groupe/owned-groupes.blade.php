@if ($ownedGroupes->isNotEmpty())
  <div class="container">
    <br><br>
    <h5>Vos UE: </h5>
    <div class="row">
      @foreach ($ownedGroupes as $groupe)
      
          <div class="col-sm-12 col-md-6 row mb-3" id="owned-group-{{$groupe->id}}">
            <div class="col-6 btn text-left">
              <a href="">{{$groupe->nom}}</a>
            </div>
            <button type="button" class="col-2 btn btn-warning " data-toggle="modal" data-target="#owned-group-{{$groupe->id}}-edit-modal">Edit</button>

            <span class="col-1"></span>
            <button class="col-2 btn btn-danger" data-toggle="modal" data-target="#owned-group-{{$groupe->id}}-delete-modal">X</button>
          </div>

          <form action="/groupe/{{$groupe->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal fade" id="owned-group-{{$groupe->id}}-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-lable-groupe-{{$groupe->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="edit-modal-lable-groupe-{{$groupe->id}}">{{$groupe->nom}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="text" name="groupeNom" class="form-control" value="{{$groupe->nom}}" required>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-success">Sauvgarder</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>

          <form action="/groupe/{{$groupe->id}}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="owned-group-{{$groupe->id}}-delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-lable-groupe-{{$groupe->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="delete-modal-lable-groupe-{{$groupe->id}}">{{$groupe->nom}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Voulez vous vraiment supprimez ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>

      @endforeach
    </div>
  </div>
  <br><br>
@endif
