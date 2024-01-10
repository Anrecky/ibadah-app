<?php

use App\Livewire\ManageUser;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ManageUser::class)
        ->assertStatus(200);
});
