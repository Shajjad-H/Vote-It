@extends('layouts.app')

@section('titre')
    Accepter
@endsection

@section('content')
  <div class="container mt-5 mb-5">
    <form action="/login" method="post">
      @csrf
      <div class="card">
        <div class="card-body text-center">
          <p>
            En se connectant au services de vote-it vous accepter les condition
            d'uilisation
          </p>
          <br>
          <p>
            <input type="submit"  value="Accepter et utiliser" class="btn btn-success">
          </p>
        </div>
      </div>
    </form>
  </div>
@endsection