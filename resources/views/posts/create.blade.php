@extends('layouts.plantilla')

@section('Title','CreatePost')

@section('Content')

<a href="{{route('home')}}" class="p-3 ms-4 mt-4 badge bg-primary text-wrap">Volver</a>

<div class="d-flex justify-content-center">

    <div class="p-4 col-7 rounded">
        <div class="card">
            <div class="card-body">
                <h1 class="text-start">Crea un nuevo Post</h1>

                <form action="{{route('post.store')}}" class="text-start" method="POST" enctype="multipart/form-data">

                    <label class="form-label mb-3"> Titulo:
                        <input type="text" name="title" class="form-control">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </label>
                    <br>


                    <label for="formFile" class="form-label mb-3">Inserte una imagen:
                        <input class="form-control" type="file" name="file" id="formFile" accept="image/*">
                        @error('file')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </label>
                    <br>

                    <label class="form-label mb-3"> Descripcion: <br>
                        <textarea name="description" rows="6" class="form-control" style="width:280px;"></textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </label>
                    <br>

                    @csrf

                    <div div="containerBtnContact" class="text-center">
                        <button type="submit" class="btn mt-3"
                            style="width:55%;background-color:#146356;color:#ede9dd;">Enviar</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


@endsection
