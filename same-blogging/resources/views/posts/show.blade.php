@extends("layouts.app")
@section("description", $post->description)
@section("content")

	<navbar>
		<img src="{{ asset('rondoudou.png') }}">
		<h1>Same Blogging</h1>
	</navbar>

 	<div id="post-content">
 		<h3>Auteur : {{$post->user->name}}</h3>
		<h1>{{ $post->description }}</h1>

		<img src="{{ asset('storage/'.$post->img_url) }}" class="post-img" alt="Image de couverture" style="max-width: 300px;">

	</div>
    
	<div class="button-return">
		<button class="button-return-article">
			<p><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
		</button>
	</div>	
@endsection