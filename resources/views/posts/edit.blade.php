@extends('layouts.plantilla')

@section('Title','Editar Post')

@section('Content')

<a href="{{route('post.index')}}" class="p-3 ms-4 mt-4 badge bg-primary text-wrap">Volver</a> <br>

<div class="d-flex justify-content-center">

    <div class="col-7">

        <div class="card rounded p-4">
            <div class="card-body">

                <h1 class="text-start">Editar Post</h1>

                <form action="{{route('post.update',$post)}}" method="POST">

                    @method('put')

                    <label class="form-label"> Titulo: <br>
                        <input type="text" name="title" class="form-control p-2" style="width:250px;"
                            value="{{$post->titulo}}">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </label>
                    <br>

                    <label class="form-label"> Descripcion: <br>
                        <textarea name="description" class="form-control p-2" style="width:450px;"
                            rows="7">{{$post->descripcion}}</textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </label>
                    <br>

                    @csrf

                    <div div="containerBtnContact" class="text-center">
                        <button type="submit" class="btn rounded-pill mt-3"
                            style="width:55%;background-color:#146356;color:#ede9dd;">Actualizar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

@if(session('infoMsj'))
<script>
    alert("{{session('infoMsj')}}")

</script>
@endif

@endsection
