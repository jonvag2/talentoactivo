<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    public function render()
    {

        $categories= Category::get()->take(5);


        return view('livewire.navigation', compact('categories'));
    }
}
