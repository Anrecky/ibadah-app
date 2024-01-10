<?php

namespace App\Livewire;

use App\Models\User;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ManageUser extends Component
{
    use WithPagination;

    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.manage-user', [
            'users' => User::where('name', 'like', '%' . $this->query . '%')->paginate(5)
        ]);
    }
}
