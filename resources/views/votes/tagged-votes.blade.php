@if ($user->taggedVotes()->isNotEmpty())
  <div class="container">
    <h4>Les votes tagger: </h4>
    <div class="row">
      @include('votes.show-vote', ['votes' => $user->taggedVotes()])
    </div>
  </div>
@endif