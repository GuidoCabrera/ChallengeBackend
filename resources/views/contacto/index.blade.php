@extends('layouts.plantilla')

@section('title','formulario contacto')

@section('Content')

<a href="{{route('post.index')}}" class="p-3 ms-4 mt-4 badge bg-primary text-wrap">Volver</a>

<div class="d-flex justify-content-center">

    <div class="col-7">

    <div class="card rounded p-4">
      <div class="card-body">

        <h1 class="text-start">Formulario de contacto</h1>

        <form action="{{route('contacto.store')}}" class="text-start" method="post">

            <label class="form-label"> Nombre: <br>
                <input type="text" name="name" autocomplete="off" class="form-control rounded-pill" style="width:230px;">
            </label>
            <br>

            @error('name')
            <p class="text-danger"><strong>{{$message}}</strong></p>
            @enderror

            <label class="form-label"> Correo: <br>
                <input type="text" name="mail" autocomplete="off" class="form-control rounded-pill" style="width:230px;"> 
            </label>
            <br>

            @error('mail')
            <p class="text-danger"><strong>{{$message}}</strong></p>
            @enderror

            <label class="form-label"> Mensaje: <br>
                <textarea name="message" rows="7" autocomplete="off" style="width:350px;"
                    class="form-control rounded"></textarea>
            </label>
            <br>

            @error('message')
            <p class="text-danger"><strong>{{$message}}</strong></p>
            @enderror

            @csrf

            <div div="containerBtnContact" class="text-center">
                <button type="submit" class="btn rounded-pill mt-3"
                    style="width:55%;background-color:#146356;color:#ede9dd;">Enviar</button>
            </div>

        </form>
    </div>
</div>

    </div>

</div>

@if(session('infomsj'))
<script>
    alert("{{session('infomsj')}}")

</script>
@endif

@endsection
