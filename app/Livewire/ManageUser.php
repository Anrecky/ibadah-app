<?php

namespace App\Livewire;

use App\Models\User;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

#[Layout('layouts.app')]
class ManageUser extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $selectedUsers = [];
    public $perPage = 5;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function updatedSearchTerm()
    {
        $this->resetPage();
        $this->perPage = 5;
    }

    public function render()
    {
        return view('livewire.manage-user', [
            'users' => User::with('roles')->where('name', 'like', '%' . $this->searchTerm . '%')->orWhere('email', 'like', '%' . $this->searchTerm . '%')->paginate($this->perPage)
        ]);
    }

    public function addUser(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));
        $this->dispatch('close-modal', 'add-user-modal');
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }
}
