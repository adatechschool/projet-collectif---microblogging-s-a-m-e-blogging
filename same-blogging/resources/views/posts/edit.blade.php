<!-- Edit Post -->
@extends("layouts.app")
@section("description", "Editer un post")
@section("content")

	<navbar>
		<img src="{{ asset('rondoudou.png') }}">
		<h1>Same Blogging</h1>
	</navbar>

	<div id="edit-posts">
		<h1>Gérer les posts</h1>

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
			
			<div id="post-title">
				<label for="description" class="label" >Titre du post</label><br/>

				<!-- S'il y a un $post->title, on complète la valeur de l'input -->
				<input type="text" name="description" value="{{ isset($post->description) ? $post->description : old('description') }}"  id="description" placeholder="Le titre du post" >

				<!-- Le message d'erreur pour "title" -->
				@error("title")
				<div>{{ $message }}</div>
				@enderror
			</div>

			<!-- S'il y a une image $post->picture, on l'affiche -->
			@if(isset($post->img_url))
			<p>
				<span>Image actuelle</span><br/>
				<img src="{{ asset('storage/'.$post->img_url) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
			</p>
			@endif

			<div class="post-img">
				<label for="img_url" class="label" >Image</label><br/>
				<input type="file" name="img_url" id="img_url" >

				<!-- Le message d'erreur pour "img_url" -->
				@error("picture")
				<div>{{ $message }}</div>
				@enderror
			</div>

			<input type="hidden" value="1" name="user_id" >

			<div>
				<input type="submit" name="valider" value="Valider" class="validate-button" >
			</div>

		</form>
	</div>

	<div class="button-return">
		<button class="button-return-article">
			<p><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
		</button>
	</div>	
@endsection