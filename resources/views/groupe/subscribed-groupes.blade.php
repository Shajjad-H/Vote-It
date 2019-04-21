@if (!empty($groupes))
<div class="container">
  <h4>Groupes abonnées: </h4>
  <div class="row">
    @foreach ($groupes as $groupe)
        <div class="col-md-6 mb-3 row">
          <div class="col-7 btn text-left">
            <a href="/groupe/{{$groupe->id}}">
              {{$groupe->nom}}
            </a>
          </div>
          <button type="button" class="btn btn-danger col-4" data-toggle="modal" data-target="#unsubscribe-group-{{$groupe->id}}-modal">Desabonner</button>
        </div>

        <form action="/groupe/desabonner/{{$groupe->id}}" method="post">
          @csrf
          @method('DELETE')
          <div class="modal fade" id="unsubscribe-group-{{$groupe->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="unsubscribe-modal-lable-groupe-{{$groupe->id}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="unsubscribe-modal-lable-groupe-{{$groupe->id}}">{{$groupe->nom}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Voulez vous vraiment Desabonner ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Desabonner</button>
                  </div>
                </div>
              </div>
            </div>
        </form>

    @endforeach
  </div>
</div>
@endif