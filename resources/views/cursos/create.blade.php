@extends('layouts.plantilla')

@section('title','Curso de Laravel')

@section('content')
    <h1>Sitio Create</h1>

    <form action="{{route('dashboard.store')}}" method="POST">

        @csrf

        <label>
            Nombre:
            <input type="text" name="name" value="{{old('name')}}">
        </label>

        {{-- Con el metodo old, el formulario mantendra la informacion ingresada por el usuario,
        en caso de que el usuario enviara el formulario sin completar todos los campos --}}

        <br>

        @error('name')
            <span>*{{ $message }}</span>
        @enderror

        <br>

        <label>
            Descripcion:
            <textarea name="descripcion" rows="5" >{{old('descripcion')}}</textarea>
        </label>

        <br>

        @error('descripcion')
            <span>*{{ $message }}</span>
        @enderror

        <br>

        <label>
            Slug:
            <input type="text" name="slug" value="{{old('slug')}}">
        </label>

        <br>

        @error('slug')
            <span>*{{ $message }}</span>
        @enderror

        <br>

        <button type="submit">Enviar formulario</button>

    </form>
    
@endsection