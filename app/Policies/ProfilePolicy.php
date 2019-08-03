<?php

namespace App\Policies;

use App\User;
use App\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any Profiles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Profile.
     *
     * @param  \App\User  $user
     * @param  \App\Profile  $Profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $profile->owner_id == $user->id;
    }

}
