<!-- Edit Post -->
@extends("layouts.app")
@section("description", "Editer un post")
@section("content")

	<h1>Editer un post</h1>

	<!-- Si nous avons un Post $post -->
	@if (isset($post))

	<!-- Le formulaire est géré par la route "posts.update" -->
	<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

	@else

	<!-- Le formulaire est géré par la route "posts.store" -->
	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

	@endif

		<!-- Le token CSRF -->
		@csrf
		
		<p>
			<label for="description" >Titre</label><br/>

			<!-- S'il y a un $post->title, on complète la valeur de l'input -->
			<input type="text" name="description" value="{{ isset($post->description) ? $post->description : old('description') }}"  id="description" placeholder="Le titre du post" >

			<!-- Le message d'erreur pour "title" -->
			@error("title")
			<div>{{ $message }}</div>
			@enderror
		</p>

		<!-- S'il y a une image $post->picture, on l'affiche -->
		@if(isset($post->img_url))
		<p>
			<span>Couverture actuelle</span><br/>
			<img src="{{ asset('storage/'.$post->img_url) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
		</p>
		@endif

		<p>
			<label for="img_url" >Couverture</label><br/>
			<input type="file" name="img_url" id="img_url" >

			<!-- Le message d'erreur pour "picture" -->
			@error("picture")
			<div>{{ $message }}</div>
			@enderror
		</p>

		<input type="hidden" value="1" name="user_id" >

		<input type="submit" name="valider" value="Valider" >

	</form>

@endsection