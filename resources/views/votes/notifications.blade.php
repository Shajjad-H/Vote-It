@includeWhen(session('deleted_vote_err'), 'components.alert', [
  'type' => 'danger',
  'text' => session('deleted_vote_err')
])