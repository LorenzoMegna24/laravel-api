@extends('layouts.projectlayout')

@section('title')
   Laravel | Project Edit
@endsection

@section('content')
    <div class="container">

        <h1>Modifica il progetto: {{$project->project_title}}</h1>

        {{-- validation error list --}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>

                    @foreach ($errors->all() as $elem)
                        <li>
                            {{$elem}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
    
            @csrf
            
            @method('PUT')

            <div class="form-group my-2">
                <label class="form-label" for="">TITOLO</label>
                <input class="form-control" type="text" name="project_title" value="{{old('project_title') ?? $project->project_title}}">
            </div>
    
            <div class="form-group my-2">
                <label class="form-label" for="">DESCRIZIONE</label>
                <textarea class="form-control" name="description" cols="30" rows="10">{{old('description') ?? $project->description}}</textarea>
            </div>
    
            {{-- campo input file --}}
            <div class="form-group my-2">
                <label class="form-label" for="">CARICA IMMAGINE</label>
                <input class="form-control" type="file" name="img" aria-describedby="fileHelpId">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">TYPE</label>
                <select class="form-select form-select-lg @error ('type_id') is-invalid @enderror" 
                name="type_id" 
                id="project-type">
                    <option selected>Select one</option>

                    @foreach ($types as $elem)

                    <option value="{{$elem->id}}" {{old('type_id', $project->type_id) == $elem->id ? 'selected' : '' }}>{{$elem->name_type}}</option>
                        
                    @endforeach

                </select>
                <div>
                    @error('type_id')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

            </div>


            <div class="form-groups d-flex justify-content-between">
                @foreach ($technologies as $elem)
                    <div class="form-check @error('technologies') is-invalid @enderror">

                        @if ( $errors->any() )
                            
                            <input class="form-check-input" 
                            type="checkbox" 
                            name="technologies[]"
                            value="{{ $elem->id }}" 
                            id="technology-{{ $elem->id }}"
                            {{ in_array( $elem->id, old( 'technologies', [] ) ) ? 'checked' : '' }}>

                        @else 

                            {{-- prima volta che entro nella edit senza errori --}}
                            <input class="form-check-input" 
                            type="checkbox" 
                            name="technologies[]"
                            value="{{ $elem->id }}" 
                            id="technology-{{ $elem->id }}"
                            {{ ($project->technologies->contains($elem)) ? 'checked' : '' }}>
                    
                        @endif



                        <label class="form-check-label" for="technology-{{ $elem->id }}">
                            {{ $elem->name_technology }}
                        </label>
                    </div>
                @endforeach

                
                @error('technologies')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>



            {{-- <div class="form-group my-2">
                <label class="form-label" for="">SLUG</label>
                <input class="form-control" type="text" name="slug">
            </div> --}}
    
            <button type="submit" class="btn btn-success my-3">MODIFICA PROGETTO</button>
        </form>   
    </div>

@endsection