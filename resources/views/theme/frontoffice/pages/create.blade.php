@extends('theme.frontoffice.layouts.admin')

@section('title','Post Admin')

@section('head')


@endsection

@section('header')

@endsection

@section('content')


<main>
        <div class="container-fluid">
            <h1 class="mt-4">Post</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/posts">Dashboard</a></li>
                <li class="breadcrumb-item active">Crreate a new post</li>
            </ol>
          <!--Valida los mensajes de error -->
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <a  class="alert alert-danger">{{ $error }}</a>
                    @endforeach
                </ul>
            @endif

            <!--formulario de Post-->
            <form method="POST" action="/posts" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text"
                    class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Ingresa el title" value="{{old('title')}} ">
                  <small id="helpId" class="form-text text-muted">Introduce el titulo del post</small>
                </div>
                <div class="form-group">
                  <label for="image">Seleccione la Imagen</label>
                  <input type="file"
                    class="form-control-file" name="image" id="image" aria-describedby="helpId" placeholder="Selecciona una imagen para el Post">
                  <small id="image" class="form-text text-muted">Seleciona una imgane de 1200 x 800 dpi</small>
                </div>
                <div class="form-group">
                  <label for="content">Ingrese el contenct</label>
                  <textarea class="form-control-file" name="post_content" id="content">{{ old('post_content') }}</textarea>
                  <small id="helpId" >Descripción del post</small>
                </div>
                <div class="form-group pt-2">
                    <input class="btn btn-primary" type="submit">
                </div>

            </form>
        </div>
        
    </main>


@endsection

@section('foot')
<script>
    CKEDITOR.replace( 'post_content' );
</script>
@endsection