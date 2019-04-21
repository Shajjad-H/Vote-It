
<div class="row">
  <div class="col-8">
    @php
      $voteRes = $vote->result($user);
    @endphp

    {{-- <a title="Votez pour" href="/votes/for/{{ $vote->id }}"
      class="btn btn-primary @if($voteRes == 'for') disabled  @endif">
      <i class="far fa-thumbs-up"></i>&nbsp;&nbsp;&nbsp;<span class="badge badge-light">{{$vote->for()}}</span>
    </a> --}}
    <a title="Votez pour" href="/votes/for/{{ $vote->id }}" class="btn @if($voteRes == 'for') disabled  @endif">
      <span class="badge badge-light">{{$vote->for()}}</span>
      <i class="far fa-thumbs-up fa-lg text-primary "></i>
    </a> 

    <a title="Votez contre" href="/votes/against/{{ $vote->id }}"
      class="btn @if($voteRes == '!for') disabled  @endif">
      <span class="badge badge-light">{{$vote->against()}}</span>
      <i class="far fa-thumbs-down fa-lg text-danger"></i>
    </a>

    <a title="Vous êtes indifferent" href="/votes/indifferent/{{ $vote->id }}"
      class="btn @if($voteRes == 'meh') disabled  @endif">
      <span class="badge badge-light"> {{$vote->indifferent()}}</span>
      <i class="far fa-meh fa-lg"></i>
    </a>

  </div>
  <div class="col-4 text-right">
    @if ($vote->user_id == $user->id /*|| $user->isAdmin()*/)
    {{-- <a href="/votes/{{$vote->id}}/edit" class=""><i class="btn far fa-edit fa-lg "></i></a> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn " data-toggle="modal" data-target="#modal-owned-to-delete{{$vote->id}}">
      <i class="fas fa-trash-alt fa-lg text-danger"></i>
    </button>
    <form action="/votes/{{$vote->id}}" method="post" class="text-left">
      @csrf
      @method('DELETE')
      @component('components.modal')
        @slot('title')
          {{$vote->titre}}
        @endslot()
        @slot('id')
          modal-owned-to-delete{{$vote->id}}
        @endslot
        @slot('body')
          Voulez vous vraiment supprimer
        @endslot
        @slot('footer')
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-danger">Supprimer</button>
        @endslot
      @endcomponent
    </form>
    @endif

  </div>
</div>