<?php

namespace App\Policies;

use App\DataMahasiswa;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if (Auth::guard('admin')->check())
        {
            return true;
        }

        else
        {
            return null;
        }
    }

    public function destroy(User $user, DataMahasiswa $post)
    {
        return $user->id === $post->id;
    }
}
