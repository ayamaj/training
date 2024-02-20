
@extends('layouts.admin.master')

@section('title', 'liste des posts')

@section('content')
<div class="container text-center">
    <div class="row">

        <h1> modifier un post</h1>
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

        <form class="form-group" action="{{ route('update_post.traitement_post') }}" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                @csrf
                <input type="text" name="id" style="display:none;" value="{{$post->id}}">
                <label for="title" class="form-label" value="{{$post-> title}}">title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="content" class="form-label" value="{{$post-> content}}">content</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <input type="hidden" name="id" value="{{ $post->id }}">

            <button type="submit" class="btn btn-primary">modifier un post</button>
            <br>
            <br><a href="/post" class="btn btn-danger">Revenir à la liste post</a>
        </form>

    </div>
  </div>
@endsection
