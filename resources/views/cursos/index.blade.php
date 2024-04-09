@extends('layouts.plantilla')

@section('title','Curso de Laravel')

@section('content')
    <h1>Sitio Dashboard</h1>

    <a href="{{route('dashboard.create')}}">Crear un curso</a>

    <br>

    <ul>
        {{-- foreach de blade para mostrar en la vista lo pedido  al controlador ( con el metodo all) --}}
        @foreach ($cursos as $curso)
        <li>
            <a href="{{route('dashboard.show',$curso)}}">{{$curso->id}}</a>
        </li>
            
        @endforeach
    </ul>

    {{-- usamos metodo links para cuando usamos paginacion en el controlador (con el metodo paginate) --}}
    {{$cursos->links()}}
@endsection