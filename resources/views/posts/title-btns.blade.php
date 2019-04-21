<div class="row">
  <div class="col-8">
    <a href="/posts/{{$post->id}}" class="text-primary h5">{{$post->titre}}</a>
  </div>

  <div class="col-4">
    <div class="row">
      <div class="col-12 col-md-4">
        <button class="btn btn-success" type="button">
            <i class="far fa-check-circle fa-lg"></i>
          {{$post->comments->count()}}
        </button>
      </div>

      @if ($post->user_id == $user->id)
        <div class="col-12 col-md-4">
          <button type="button" class="btn ">
            <i class="fas fa-trash-alt fa-lg text-danger"></i>
          </button>
        </div>
        <div class="col-12 col-md-4">
          <a href="/posts/{{$post->id}}/edit" class=""><i class="btn far fa-edit fa-lg "></i></a>
        </div>
      @endif

    </div>
  </div>
  <div class="col-12">
    <a href="/groupe/{{$post->groupe->id}}" class="text-primary">{{$post->groupe->nom}}</a>
    <span class="text-muted">{{$post->created_at->diffForHumans()}}</span> par 
    <a href="/user/{{$post->user->id}}" class="text-primary">{{$post->user->pseudo}}</a>
  </div>
</div>