@extends('theme.backoffice.layouts.admin')

@section('title','Contact')

@section('head')


@endsection

@section('header')
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Inicio Blog</h1>
					<span class="subheading">A Blog Theme by Start Bootstrap</span>
				</div>
			</div>
		</div>
	</div>
</header>
@endsection

@section('container')


<div class="col-lg-8 col-md-10 mx-auto">
	<div class="row">

		@foreach ($posts as $post)

		<div class="col-md-4">
		  <img class="img-thumbnail mt-4" width="100%" src="{{ asset('/storage/images/posts_images/'.$post['image_url']) }}" alt="post_image">
		</div>
		<div class="col-lg-8">
			<div class="post-preview">
			  <a href="/home/{{$post['id']}}">
				<h2 class="post-title">
				  {{$post['title']}}
				</h2>
				<h3 class="post-subtitle">
				  {!! getShorterString($post['content'],150) !!}
				</h3>
			  </a>
			  <p class="post-meta">Posted by
				<a href="#">{{$post->user['name']}}</a>
				on {{$post['created_at']}}</p>
			</div>          
		</div>
		<hr>
		@endforeach

	</div>
	
	<!-- Pager -->
	
	<div class="clearfix">
		<a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
	</div>
</div>
<hr>
@endsection

@section('foot')

@endsection