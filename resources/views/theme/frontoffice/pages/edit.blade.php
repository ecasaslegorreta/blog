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
                <li class="breadcrumb-item"><a href="/posts">Post</a></li>
                <li class="breadcrumb-item active">Actauliza Post</li>
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
            <form method="POST" action="/posts/ {{$post->id}} " enctype="multipart/form-data">
                @method('PATCH')
                @csrf()

                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text"
                    class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Ingresa el title" value="{{ $post->title}} ">
                  <small id="helpId" class="form-text text-muted">Introduce el titulo del post</small>
                </div>

                <div class="form-group">
                  <label for="image">Seleccione la Imagen</label>
                  <input type="file"
                    class="form-control-file" name="image" id="image" aria-describedby="helpId" value="{{ $post->image_url }}" placeholder="Selecciona una imagen para el Post">

                    <div class="row">
                      <img src="{{asset('/storage/images/posts_images/'. $post->image_url)}}" class="img-thumbnail  rounded float-left" alt="{{ $post-> image_url}}" width="250">
                    </div>

                  <small id="image" class="form-text text-muted">Seleciona una imgane de 1200 x 800 dpi</small>
                </div>

                <div class="form-group">
                  <label for="content">Ingrese el content</label>
                  <textarea class="form-control-file" name="post_content" id="content">{{ $post->content }}</textarea>
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