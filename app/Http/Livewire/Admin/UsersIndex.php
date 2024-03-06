<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    public $search;/*  esto es para crear un buscador dinamico en la tabla de usuarios, video 21 03 de como crear un blog autoadmistrable de victor arana flores */
    protected $paginationTheme = "bootstrap"; /* esto debido a que la vista donde lo queremos imprimir esta con boostrap, a partir de laravel 8 por default esta en taildwind */

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
 
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                        ->paginate(9); /* para poder usar pagination hay que importar use Livewire\WithPagination; y en la funcion usarla use WithPagination; */
        /* el metodo paginate pagina de 15 en 15 si no le colocamos nada */
        return view('livewire.admin.users-index', compact('users'));
    }
}
