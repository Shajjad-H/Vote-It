<div class="alert alert-{{ isset($type) ? $type :'success' }} alert-dismissible fade show" role="alert">
  {!! $text !!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>