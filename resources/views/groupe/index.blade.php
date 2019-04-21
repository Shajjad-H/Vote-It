@extends('layouts.app')

@section('titre')
  UE
@endsection


@section('content')

<div class="mt-5 mb-5">
  @include('groupe.abboner')
  @include('groupe.creer')
  @include('groupe.owned-groupes', compact($ownedGroupes))
  @include('groupe.subscribed-groupes', compact($groupes))
</div>


  <style>
    .border-around-small {
      border: 1px #B3B6B7 solid;
    }
  </style>


@endsection