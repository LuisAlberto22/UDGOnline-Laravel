<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    /**
     * Handle the User "created" event.
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $role = strlen($user->key) > 8 ? "Alumno":"Maestro";
        $user->assignRole($role);
        Storage::makeDirectory($role.'s/'.$user->key.'/img');
    }

    /**
     * Handle the User "deleted" event.
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        Storage::deleteDirectory($user->roles()->first()->name.'s/'.$user->key.'/img');
    }

}
