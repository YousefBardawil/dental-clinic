<?php

namespace App\Policies;

use App\Models\OpeningHour;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OpeningHourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Index-OpeningHour')
        ?  $this->allow()
        : $this->deny('can not show Index-OpeningHour');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, OpeningHour $openingHour)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Create-OpeningHour')
        ?  $this->allow()
        : $this->deny('can not show Create-OpeningHour');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Edit-OpeningHour')
        ?  $this->allow()
        : $this->deny('can not show Edit-OpeningHour');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Delete-OpeningHour')
        ?  $this->allow()
        : $this->deny('can not show Delete-OpeningHour');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, OpeningHour $openingHour)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, OpeningHour $openingHour)
    {
        //
    }
}
