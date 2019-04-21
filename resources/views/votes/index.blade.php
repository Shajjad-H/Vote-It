@extends('layouts.app')

@section('titre')
    Votes
@endsection

@section('content')
    
    @include('components.centered-btn', [
        'route' => route('votes.create'),
        'text' => 'Creer un vote'
    ])
    
    <div class="container">
        @include('votes.notifications')
    </div>
    @php
        $col = 'col-md-6';
    @endphp
    @include('votes.owned-votes')
    @include('votes.tagged-votes')
    @include('votes.owned-groupes-votes')
    @include('votes.subscribed-groupes-votes')

@endsection
