@extends('layouts.plantilla')

@section('Title','Editar Post')

@section('Content')

<a href="{{route('post.index')}}" class="p-3 ms-4 mt-4 badge bg-primary text-wrap">Volver</a> <br>

<div class="col-10 mx-auto">

<div class="d-flex flex-column align-content-center align-items-center justify-content-center">
    <h1>Titulo de Post: {{$post['titulo']}}</h1>

    <br>

    <p><strong>Descripcion: </strong> {{$post['descripcion']}}</p>

    <br>
    
    <img src="../../public/{{$post['urlImagen']}}" width="450px" class="img-fluid" alt="">

    <br>

    <p><strong>Fecha creacion: </strong>{{$post['created_at']}}</p>

    <p><strong>Fecha Modificacion: </strong>{{$post['updated_at']}}</p>
</div>

</div>


@endsection
