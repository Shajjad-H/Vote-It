<div class="row">
    <p class="col-12">
      {{$comment->comment}}
    </p>
    <div class="col-12">
      <div class="row">
        <div class="col-sm-12 col-md-8">
          {{$comment->created_at->diffForHumans()}} par 
          <a href="/user/{{$comment->user->id}}" class="text-primary">{{$comment->user->pseudo}}</a>
        </div>
  
        @if ($comment->user_id == $user->id)
          <div class="col-sm-12 col-md-1">
            <button type="button" class="btn ">
              <i class="fas fa-trash-alt fa-lg text-danger"></i>
            </button>
          </div>
          <div class="col-sm-12 col-md-1">
            <a href="/posts/{{$post->id}}/comment/{{$post->id}}/edit" class=""><i class="btn far fa-edit fa-lg "></i></a>
          </div>
        @endif
      </div>

    </div>
  </div>
  <hr>
  <br>