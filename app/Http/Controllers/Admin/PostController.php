<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;/* esto se hizo en el video como crear un nuevo post de como crear un blog autoadministrable, victor arana flores */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories= Category::pluck('name', 'id');
        $tags= Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if ($request->file('file')) {

            $url = Storage::put('posts', $request->file('file')); /* Storage::put se encarga de guardar la imagen y generar una ruta la cual es guardada en la variable url  ver video de victor arana flores aprende a crear un sistema de  blog con laravel8  */
            $post->image()->create([
                'url' => $url 
            ]);
        }

        /* Cache::forget('key'); *//* eliminar la cache. se le pasa el nombre de la cache */
        Cache::flush(); /* este elimina toda la cache */

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $this->authorize('author', $post);/* esto es para que o se editen post de otros usuarios ya sea porque pongo el id en la url. esto se obtiene a traves de un policy sacado del video de como crear un blog autoadministrable de victor arana flores video 18 en policies */

        $categories= Category::pluck('name', 'id');
        $tags= Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    { 
        $this->authorize('author', $post);/* esto es para que o se editen post de otros usuarios ya sea porque pongo el id en la url. esto se obtiene a traves de un policy sacado del video de como crear un blog autoadministrable de victor arana flores video 18 en policies */

        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags); /* eno se usa el metodo attach ya que siempre se creara uno mas, con sync el verifica si ya existe y lo actualiza */
        }
        Cache::flush(); /* este elimina toda la cache */
        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);/* esto es para que o se editen post de otros usuarios ya sea porque pongo el id en la url. esto se obtiene a traves de un policy sacado del video de como crear un blog autoadministrable de victor arana flores video 18 en policies */

        $post->delete();
        Cache::flush(); /* este elimina toda la cache */

        return redirect()->route('admin.posts.index')->with('info', 'El post se elimino con exito');
    }
}
 