<x-guest-layout>
  {{$post->user->name}}:
  {{$post->description}}
  <img src="{{ $post->img_url }}">
</x-guest-layout>

@extends("layouts.app")
@section("description", $post->description)
@section("content")

	<h1>{{ $post->description }}</h1>

	<img src="{{ asset('storage/'.$post->img_url) }}" alt="Image de couverture" style="max-width: 300px;">

	<div>{{ $post->content }}</div>

	<p><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>

@endsection