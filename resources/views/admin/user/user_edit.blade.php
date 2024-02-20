
@extends('layouts.admin.master')

@section('title', 'liste des etudiants')

@section('content')
<div class="container text-center">
    <div class="row">

        <h1> modifier un etudiant</h1>
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

        <form class="form-group" action="{{ route('update.traitement') }}" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                @csrf

                <input type="text" name="id" style="display:none;" value="{{$etudiant->id}}">
                <label for="nom" class="form-label" value="{{$etudiant-> nom}}">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>

            <div class="form-group">
                <label for="prenom" class="form-label" value="{{$etudiant-> prenom}}">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>

            <div class="form-group">
                <label for="classe" class="form-label" value="{{$etudiant-> classe}}">Classe</label>
                <input type="text" class="form-control" id="classe" name="classe">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <input type="hidden" name="id" value="{{ $etudiant->id }}">

            <button type="submit" class="btn btn-primary">modifier un étudiant</button>
            <br>
            <br><a href="/etudiant" class="btn btn-danger">Revenir à la liste d'étudiants</a>
        </form>

    </div>
  </div>
@endsection
