@extends('layouts.admin.master')

@section('title', 'liste des etudiants')

@section('content')
 <div class="container text-center">
        <div class="row">
          <div class="col s12">
            <h1>etudiant</h1>
            <hr>
            <a   href="{{ route('etudiant.ajouter')}}"class="btn btn-primary">ajouter un etudiant </a>
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
                        <th>nom</th>
                        <th>prenom</th>
                        <th>classe</th>
                        <th>image</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>

    @foreach ($etudiants as $etudiant)
 <tr>
                        <td>{{ $etudiant->id }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->classe }}</td>
                        <td><img src="{{ asset($etudiant->image) }}" width="50" height="60" alt="{{ $etudiant->nom }}"></td>
                        <td>
                            <a href="{{ route('etudiant.update',['id' =>$etudiant->id]) }}" class="btn btn-info">update</a>
                            <!-- <a href=" route('etudiant.delete',['id' =>$etudiant->id]) }}"  class="btn btn-danger">delete</a> -->
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $etudiant->id }}">
                                   delete
                        </button>
                    


  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $etudiant->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a type="button" class="btn btn-primary" href="{{ route('etudiant.delete',['id' =>$etudiant->id])}}"> yes</a>
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


