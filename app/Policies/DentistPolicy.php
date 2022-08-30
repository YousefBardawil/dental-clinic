<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Dentist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DentistPolicy
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
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Index-Dentist')
        ?  $this->allow()
        : $this->deny(' can not show index Dentist');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Dentist $dentist)
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
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Create-Dentist')
        ?  $this->allow()
        : $this->deny(' can not show create Dentist');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Edit-Dentist')
        ?  $this->allow()
        : $this->deny(' can not show Edit Dentist');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Delete-Dentist')
        ?  $this->allow()
        : $this->deny(' can not Delete Dentist');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Dentist $dentist)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Dentist $dentist)
    {
        //
    }
}
