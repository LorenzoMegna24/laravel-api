@extends('layouts.projectlayout')

@section('title')
   Laravel | Project Show
@endsection

@section('content')
   <h1>Singolo progetto</h1>
   <h2>{{$project->project_title}}</h2>    
   <p>{{$project->description}}</p>
   <img class="img-fluid" src="{{asset('storage/' . $project->img)}}" alt="">

   @if ($project->type)
   <div>
      Type: {{$project->type->name_type}}
   </div>
   @endif
   @if ($project->technologies)
       @foreach ($project->technologies as $elem)
           <div>
            Technologies: {{$elem->name_technology}}
           </div>
       @endforeach
   @endif

@endsection