@extends('layouts.plantilla')

@section('title','Curso de Laravel')

@section('content')
<h1>Deja un mensaje</h1>

<form action="{{route('contactanos.store')}}" method="POST">

    @csrf


    <label>
        Nombre:
        <br>
        <input type="text" name="name" value={{old('name')}}>
    </label>
    <br>

    @error('name')

        <p>{{$message}}</p>
        
    @enderror

    <label>
        Correo:
        <br>
        <input type="text" name="correo" value={{old('correo')}}>
    </label>
    <br>

    @error('correo')

    <p>{{$message}}</p>
    
    @enderror

    <label>
        Mensaje:
        <br>
        <textarea name="mensaje" rows="4">{{old('name')}}</textarea>
    </label>

    <br>

    @error('mensaje')

    <p>{{$message}}</p>
    
    @enderror

    <button type="submit">
        Enviar Mensaje
    </button>
</form>


@if(@session('info'))
    <script>
        alert("{{session('info')}}");
    </script>
@endif
    


@endsection