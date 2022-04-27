

@extends("layouts.app")
@section("description", $post->description)
@section("content")
 <h3>{{$post->user->name}}:</h3>
	<h1>{{ $post->description }}</h1>)

	<img src="{{ asset('storage/'.$post->img_url) }}" alt="Image de couverture" style="max-width: 300px;">

	<!-- <div>{{ $post->content }}</div> -->

	<p><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
@endsection