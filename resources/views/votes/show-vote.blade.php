{{--<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>--}}

@foreach ($votes as $vote)
  <div class="{{ isset($col) ? $col: ''}} col-sm-12 mb-3" id="vote-id-{{$vote->id}}">
    <div class="card">
      <div class="card-body hover-btns">
        <div class="row">
          <div class="col-8">
            <h5 class="card-title">{{$vote->titre}}</h5>
          </div>
          <div class="col-4 text-right">
            <button title="Total des gens concerné" class="btn btn-success">
              <i class="fas fa-users"></i>
              <span class="badge badge-light">{{$vote->total()}}</span>
            </button>
          </div>
        </div>
        <h6 class="card-subtitle mb-2 text-muted">{{$vote->created_at->diffForHumans()}}</h6>
        <p class="card-text">{{$vote->description}}</p>

          @foreach ($vote->groupes as $groupe)
              <a class="card-link m-0 mr-3 text-primary" href="/groupe/{{ $groupe->id }}">{{$groupe->nom}}</a>
          @endforeach
        <br><br>
        
        @foreach ($vote->users as $userb)
            <a class="card-link m-0 mr-3 text-primary" href="/user/{{ $userb->id }}">{{$userb->pseudo}}</a>
        @endforeach
        <br><br>
        @include('votes.vote-btns')

      </div>
    </div>
  </div>
@endforeach


