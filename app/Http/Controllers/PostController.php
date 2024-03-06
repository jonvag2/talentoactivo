<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cache; 


class PostController extends Controller 
{
    public function index(){
        $tags = Tag::get()->take(3);

/* return $tags; */
        return view('posts.index'/* , compact('posts', 'tags') */); 
    }

    public function index2 (){


        return redirect()->route('posts.index'); 
    }
    public function index3 (){


        return 'estoy en el cotrolador'; 
    }

    public function refrescar (){

        Cache::flush(); /* este elimina toda la cache */

        return redirect()->route('posts.index'); 
    }

    public function show (Post $post){
        /* return $post; */
        /* $posts = Post::where('id', $post)->get(); */
        $this->authorize('published', $post);/* esto es para que o se vean post de otros usuarios ya sea porque pongo el id en la url. esto se obtiene a traves de un policy sacado del video de como crear un blog autoadministrable de victor arana flores video 18 en policies */
        $similares = Post::where('category_id', $post->category_id )
                                ->where('status', 2)
                                ->where('id', '!=', $post->id )
                                ->latest('id')
                                ->take(4)
                                ->get(); 
        return view('posts.show', compact('post', 'similares'));
    }

    public function carlo ($dato){
        return $dato;
        /* $posts = Post::where('id', $post)->get(); */

        /* $similares = Post::where('category_id', $post->category_id )
                                ->where('status', 2)
                                ->where('id', '!=', $post->id )
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('posts.show', compact('post', 'similares')); */
    }

    public function category (Category $category){
        /* $posts = Post::where('id', $post)->get(); */

        $posts = Post::where('category_id', $category->id )
                                ->where('status', 2)
                                ->latest('id')
                                ->paginate(6);

                                /* return $posts; */

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag (Tag $tag){
        /* $posts = Post::where('id', $post)->get(); */

        $posts= $tag->posts()->where('status', 2)->latest('id')->paginate(4); /* esto es una consulta a una relacion (tabla posts y tags) con una condicion */

        return view('posts.tag', compact('posts', 'tag'));
    }

}
