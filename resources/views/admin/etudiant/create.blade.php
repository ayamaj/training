

@extends('layouts.admin.master')

@section('title', 'liste des etudiants')

@section('content')
<div class="container text-center">
    <div class="row">

        <h1> AJOUTER UN ETUDIANT </h1>
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

        <form class="form-group" action="{{ route('etudiant.traitement') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @csrf
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>

            <div class="form-group">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>

            <div class="form-group">
                <label for="classe" class="form-label">Classe</label>
                <input type="text" class="form-control" id="classe" name="classe">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter un étudiant</button>
            <br>
            <br><a  href="{{ route('etudiant.liste') }}" class="btn btn-danger">Revenir à la liste d'étudiants</a>
        </form>





    </div>
  </div>
@endsection
