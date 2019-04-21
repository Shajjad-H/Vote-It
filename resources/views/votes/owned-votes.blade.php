@if ($user->votes->isNotEmpty())
<div class="container">
  <h4>Vos Votes :</h4>
  <div class="row">
    @include('votes.show-vote', ['votes' => $user->votes])
  </div>
</div>
@endif