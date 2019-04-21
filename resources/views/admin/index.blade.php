@extends('layouts.app')

@section('titre')
    Admin
@endsection

@section('content')
  <div class="container mt-3 mb-5">
    <div class="list-group">
        <h2>Liste des Utilisateur</h2>
        @foreach ($users as $user)
          <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#user-list-id-{{$user->id}}" role="button" aria-expanded="false" aria-controls="user-list-id-{{$user->id}}">
            {{$user->ps_fname}}
          </a>

          <div class="collapse" id="user-list-id-{{$user->id}}">
              <div class="card card-body">
                <p>Roles : </p>
                <div class="row">
                  <div class="col-md-6">
                    @foreach ($user->roles() as $role)
                      <div class="row">
                        <div class="col-9">{{$role->role}}</div>
                        <div class="col-3">
                          <form action="/user/{{$user->id}}/destroy/role/{{$role->id}}" class="form-group" method="post">
                                @csrf
                                @method('DELETE')
                              <input type="submit" value="X" class="form-control btn btn-danger">
                            </form>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <form action="/user/add/{{$user->id}}/role" method="post" class="form-group col-md-6 row">
                      @csrf
                      <div class="col-8">
                        <input type="text" class="form-control" name="role" id="" placeholder="ajouter un role" required>
                      </div>
                      <div class="col-4">
                        <input type="submit" class="btn btn-success form-control" value="Ajouter">
                      </div>
                  </form>
                </div>
              </div>
          </div>

        @endforeach
    </div>  
  </div>

@endsection