<!-- Fonctionalites -->
<div class="w3-card w3-round">
  <div class="w3-white">
    <a href="/groupe" class="rounded-0 btn w3-button w3-block text-left">
      <i class="fas fa-book-open fa-fw w3-margin-right"></i> UE
    </a>
    <a href="/votes" class="rounded-0 btn w3-button w3-block text-left">
      <i class="fas fa-vote-yea fa-fw w3-margin-right"></i> Votes
    </a>
    <a class="rounded-0 btn w3-button w3-block text-left">
      <i class="fa fa-users fa-fw w3-margin-right"></i> Forum
    </a>
    {{-- define dans layouts.app --}}
    @if ($user->isAdmin())
      <a href="user/admin" class="rounded-0 btn w3-button w3-block text-left">
        <i class="fas fa-tools fa-fw w3-margin-right"></i> Admin
      </a>
    @endif
  </div>
</div>
<br><br>