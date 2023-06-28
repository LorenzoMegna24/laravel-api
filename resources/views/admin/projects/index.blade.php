@extends('layouts.projectlayout')

@section('title')
   Laravel | Project
@endsection

@section('content')
<div class="container">

  <h1>Tutti i progetti</h1>
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {!! Session::get('success') !!}
    </div>
  @endif
  <a class="btn btn-primary my-3" href="{{route('admin.projects.create')}}">Inserisci nuovo progetto</a>
      

  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Project Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $elem)
      <tr>
        <th scope="row">{{$elem->id}}</th>
        <td>{{$elem->project_title}}</td>
        <td>{{$elem->slug}}</td>
        <td>
          <a href="{{route('admin.projects.show', $elem)}}">Show</a>
          <a href="{{route('admin.projects.edit', $elem)}}">Edit</a>
          <form action="{{route('admin.projects.destroy', $elem)}}" method="POST">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('sei sicuro di voler eliminare il progetto?')" type="submit" class="btn btn-danger">DELETE</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection