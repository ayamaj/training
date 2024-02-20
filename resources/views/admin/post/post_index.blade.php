@extends('layouts.admin.master')

@section('title', 'liste des posts')

@section('content')
 <div class="container text-center">
        <div class="row">
          <div class="col s12">
            <h1>post</h1>
            <hr>
            <a   href="{{ route('post.ajouter_post')}}"class="btn btn-primary">ajouter un post </a>
            <hr>
            @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>content</th>
                        <th>image</th>

                    </tr>
                </thead>
                <tbody>

    @foreach ($posts as $post)
 <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <p>Posted by: {{ $post->etudiant->nom }}</p>
                        <td>{{ $post->content }}</td>

                        <td><img src="{{ asset($post->image) }}" width="50" height="60" alt="{{ $post->nom }}"></td>
                        <td>
                            <a href="{{ route('post.update_post',['id' =>$post->id]) }}" class="btn btn-info">update</a>
                            <!-- <a href=" route('etudiant.delete',['id' =>$etudiant->id]) }}"  class="btn btn-danger">delete</a> -->
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                                   delete
                        </button>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
          <a type="button" class="btn btn-primary" href="{{ route('post.delete_post',['id' =>$post->id])}}"> yes</a>
        </div>
      </div>
    </div>
  </div>
</td>
</tr>



                @endforeach


                </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection


