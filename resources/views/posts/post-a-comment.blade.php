<form action="/posts/comment/{{$post->id}}" method="POST">
  @csrf
  <div class="form-group">
    <textarea name="comment" class="form-control" id="" cols="30" rows="10" required></textarea>
  </div>
  <div class="form-group">
    <input type="submit" class="form-control btn btn-success" value="Repondre">
  </div>
</form>