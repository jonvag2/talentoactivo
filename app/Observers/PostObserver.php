<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{

    public function creating(Post $post)
    {
        if (! \App::runningInconsole()) {/* Este if es para que cuando se ingresen datos por el seeder no se error ya que esto busca que sea un usuario regitrado */
            $post->user_id = auth()->user()->id; 
        }
    }

    public function deleting(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image->url);
        }
    }

}
