@extends('layouts.plantilla')

@section('Title','HomePosts')

@section('Content')

<?php
function recortarTexto($texto, $limite=20){
    $texto = trim($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if($tamano <= $limite){
        return $texto;
    }else{
        $resultado = substr($texto, 0, $limite);
        $resultado .= '...';
    }
    return $resultado;
}
?>

<div id="containerHeader">
    <div class="row">
        <div class="col">
            <a href="{{route('post.create')}}" class="p-3 ms-4 mt-4 badge bg-primary text-wrap">crear nuevo post</a>
            <a href="{{route('contacto.index')}}" class="p-3 ms-2 mt-4 badge bg-primary text-wrap">Contacto</a>
        </div>
        <div class="col">
            <form action="{{route('post.index')}}" method="get">
                <input type="text" name="search" autocomplete="off"
                    class="mt-4 p-2 form-control border-rounded float-end" style="margin-right:13px; width:180px;"
                    value="{{$search}}" placeholder="Ingrese su Busqueda">
            </form>
        </div>
    </div>
</div>

<div class="container-fluid my-3">
    <div class="row">
        <div class="col-8 mx-auto">

            @foreach($posts as $post)
            <div class="accordion" id="accordionPost">

                <div class="card rounded" id="cardPost">

                    <div class="card-header text-center">
                        <a href="#AccordionHome{{$post->id}}" class="card-link fw-bolder" style="text-decoration:none; color:#1f1d1d" data-toggle="collapse"
                            data-parent="#accordionPost">{{$post->titulo}}</a>
                    </div>

                    <div id="AccordionHome{{$post->id}}" class="collapse">
                        <div class="card-body text-center">
                            <p>Descripcion: {{recortarTexto($post->descripcion,35)}}</p>
                            <p>Creado el: {{$post->created_at}}</p>

                            <div class="row">

                                <div class="col">

                                    <form action="{{route('post.destroy',$post)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="text-end" id="containerBtnDelete">
                                            <button type="submit" class="btn btn-warning">Eliminar</button>
                                        </div>
                                    </form>

                                </div>

                                <div class="col">

                                    <div class="text-start" id="containerBtnEdit">
                                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-info">Editar</a>
                                    </div>

                                </div>

                            </div>
                            <!-- Cierre div class 'row' -->

                        </div>
                    </div>

                </div>

            </div>
            @endforeach
            <!-- Cierre acordeon -->

        </div>
    </div>
</div>
<!-- Cierre contenedor acordeon -->



<div class="float-end" style="margin-right: 12px;" id="containerPaginate">
    {!! $posts->appends(["search" => $search]) !!}
</div>

@endsection
