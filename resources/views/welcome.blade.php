@extends('layouts.app')

@section('titre')
    Home
@endsection

@section('content')


@if (Cas::guest())
    <!-- code unconnected-->
    @include('unconnected.unconnected_base')
@else

<!-- Page Container de connection -->
<div class="container-fluid mt-5">
      <!-- The Grid -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-3 col-md-6">
            @include('welcome.profile', ['User' => $user])
        </br>
            @include('welcome.fonctionalites')
        </div>

        <div class="col-md-6 d-lg-none">
                @include('welcome.evenement')
        </div>

        <!-- End Left Column -->
        <!-- Middle Column -->
        <div class="col-lg-7">
            <div class="container">
                @include('votes.notifications')
            </div>
            
            <div class="row">
                @include('votes.show-vote', ['votes' => $user->ralatedVotes()])
            </div>
            {{--      
            @include('votes.owned-votes')
            @include('votes.tagged-votes')
            @include('votes.owned-groupes-votes')
            @include('votes.subscribed-groupes-votes')
            --}}
        </div>
        <!-- End Middle Column -->

        
    </div>

</div>

@endif

@endsection

@include('votes.vote-btns-scrpt')


