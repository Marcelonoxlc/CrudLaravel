@extends('layouts.plantilla')

@section('title','Curso de Laravel')

@section('content')
    <h1>Sitio Show : {{$curso->name}} </h1>

    <br>

    <a href="{{route('dashboard.index')}}">ir a dashboard</a>

    <br>

    <a href="{{route('dashboard.edit',$curso)}}">Editar curso</a>

    <form action="{{route('dashboard.destroy',$curso)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>

@endsection