@extends('layouts.plantilla')

@section('Content')

<a href="{{route('post.index')}}" class="p-3 ms-4 mt-4 badge bg-primary text-wrap" style=" position: relative; z-index:5;">Ver posts</a>
<a href="{{route('post.create')}}" class="p-3 ms-2 mt-4 badge bg-primary text-wrap" style="position: relative; z-index:5;">Crear nuevo post</a>

<div class="d-flex flex-column align-items-center justify-content-center" style="position: absolute; left:0; right:0; top:0; bottom:0; z-index:3;">

<h1 class="display-1"><strong>Challenge Back-end<strong></h1>

</div>

@endsection