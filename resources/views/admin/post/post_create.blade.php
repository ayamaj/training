

@extends('layouts.admin.master')

@section('title', 'liste des posts')

@section('content')
<div class="container text-center">
    <div class="row">

        <h1> AJOUTER UN POSTE </h1>
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

        <form class="form-group" action="{{ route('post.traitement_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @csrf
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="content" class="form-label">content</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>


            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter un poste</button>
            <br>
            <br><a  href="{{ route('post.liste_post') }}" class="btn btn-danger">Revenir à la liste d'étudiants</a>
        </form>





    </div>
  </div>
@endsection
