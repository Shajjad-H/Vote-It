@if ($user->ownedGroupesVotes() && $user->ownedGroupesVotes()->isNotEmpty())
<div class="container">
  <h4>Vos Groupe Vote :</h4>
  <div class="row">
    @include('votes.show-vote', ['votes' => $user->ownedGroupesVotes()])
  </div>
</div>
@endif