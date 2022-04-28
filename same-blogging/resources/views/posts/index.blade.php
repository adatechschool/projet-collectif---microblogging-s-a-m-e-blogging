@extends("layouts.app")
@section("description", "Tous les articles")
@section("content")

	<navbar>
		<img src="{{ asset('rondoudou.png') }}">
		<h1>Same Blogging</h1>
	</navbar>

	<div id="body-index">
		<h2>Tous les articles</h2>

		<p>
			<!-- Lien pour créer un nouvel article : "posts.create" -->
			<button id="new-post">
				<a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouveau post</a>
			</button>
		</p>

		<!-- Le tableau pour lister les articles/posts -->
		<table border="1" >
			<thead>
				<tr>
					<th>Publications</th>
					<th colspan="2" >Gérer</th>
				</tr>
			</thead>
			<tbody>
				<!-- On parcourt la collection de Post -->
				@foreach ($posts as $post)
				<tr>
					<td class="title">
						<!-- Lien pour afficher un Post : "posts.show" -->
						<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->description }}</a>
					</td>

					<div>
						<td class="edit-post-one">
							<!-- Lien pour modifier un Post : "posts.edit" -->
							<a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
						</td>
						<td class="edit-post-two">
							<!-- Formulaire pour supprimer un Post : "posts.destroy" -->
							<form method="POST" action="{{ route('posts.destroy', $post) }}" >
								<!-- CSRF token -->
								@csrf
								<!-- <input type="hidden" name="_method" value="DELETE"> -->
								@method("DELETE")
								<input type="submit" value="Supprimer" >
							</form>
						</td>
					</div>
				</tr>
				@endforeach
			</tbody>
		</table>
</div>	
	
@endsection