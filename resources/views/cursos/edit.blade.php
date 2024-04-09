@extends('layouts.plantilla')

@section('title','Curso de Laravel')

@section('content')
    <h1>Sitio Edit</h1>

    <form action="{{route('dashboard.update',$curso)}}" method="POST">

        @csrf

        @method('put')

        <label>
            Nombre:
            <input type="text" name="name" value="{{old('name',$curso->name)}}">
        </label>

        <br>

        @error('name')
            <span>*{{ $message }}</span>
        @enderror

        <br>

        <label>
            Descripcion:
            <textarea name="descripcion" rows="5">{{old('descripcion',$curso->descripcion)}}
            </textarea>
        </label>

        <br>

        @error('descripcion')
            <span>*{{ $message }}</span>
        @enderror

        <br>

        <label>
            Slug:
            <input type="text" name="slug" value="{{old('slug',$curso->slug)}}">
        </label>

        <br>

        @error('slug')
            <span>*{{ $message }}</span>
        @enderror

        <br>

        <button type="submit">Actualizar formulario</button>

    </form>
    
@endsection