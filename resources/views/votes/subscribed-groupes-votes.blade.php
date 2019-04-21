@foreach ($user->groupes()->get() as $groupe)
    <div class="container">
      <h4>{{$groupe->nom}}</h4>
      {{-- @php
          if($groupe->nom == "L3 LIFProjet 2019")
            dd($groupe->votes);
      @endphp --}}
      <div class="row">
        @include('votes.show-vote', ['votes' => $groupe->votes])
      </div>
    </div>
@endforeach

