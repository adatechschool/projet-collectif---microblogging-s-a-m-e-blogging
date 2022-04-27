<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //On récupère tous les Post
        $posts = Post::all();
        // On transmet les Post à la vue
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // 2. On upload l'image dans "/storage/app/public/posts"
    $chemin_image = $request->img_url->store("posts");

    // 3. On enregistre les informations du Post
    $post = Post::create([
        "description" => $request->description,
        "img_url" => $chemin_image,
        "user_id" => $request->user_id,
    ]);

    // 4. On retourne vers tous les posts : route("posts.index")
    $posts=Post::all();
    return view('posts.index',['posts'=>$posts]);
    //return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // 1. La validation

    // Les règles de validation pour "title" et "content"
  /*   $rules = [
        'description' => 'bail|required|string|max:255',
    ]; */

    /* $validated = $request->validate([
        'description' => 'required|unique:posts|max:255',
    ]); */   

    // Si une nouvelle image est envoyée
    if ($request->has("img_url")) {
        // On ajoute la règle de validation pour "img_url"
        $rules["img_url"] = 'bail|required|image|max:1024';
    }

    // $this->validate($request, $rules);

    // 2. On upload l'image dans "/storage/app/public/posts"
    if ($request->has("img_url")) {

        //On supprime l'ancienne image
        Storage::delete($post->img_url);

        $chemin_image = $request->img_url->store("posts");
    }

    // 3. On met à jour les informations du Post
    $post->update([
        "description" => $request->description,
        "img_url" => isset($chemin_image) ? $chemin_image : $post->img_url,
        // "content" => $request->content
    ]);

    // 4. On affiche le Post modifié : route("posts.show")
    // return redirect(route("posts.show", $post));

    //return view("posts.show", $post);
    return view('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    // On supprime l'image existant
    Storage::delete($post->img_url);

    // On les informations du $post de la table "posts"
    $post->delete();

    // Redirection route "posts.index"
    return redirect(route('posts.index'));
    }
}
