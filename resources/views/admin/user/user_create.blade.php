

@extends('layouts.admin.master')

@section('title', 'liste des users')

@section('content')
<div class="container text-center">
    <div class="row">

        <h1> AJOUTER UN USER </h1>
        <hr>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>

        <form class="form-group" action="{{ route('user.traitement_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @csrf
                <label for="nom" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="prenom" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter un user</button>
            <br>
            <br><a  href="{{ route('user.liste_user') }}" class="btn btn-danger">Revenir à la liste user</a>
        </form>





    </div>
  </div>
@endsection
