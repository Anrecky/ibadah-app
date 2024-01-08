<?php

namespace App\Livewire;

use Livewire\Component;

class DarkModeToggle extends Component
{
    public $darkMode = false;

    public function toggleDarkMode()
    {
        $this->darkMode = !this->darkMode;
    }

    public function render()
    {
        return view('livewire.dark-mode-toggle');
    }
}
