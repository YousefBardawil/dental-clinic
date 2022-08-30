<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Client;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
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
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Index-Client')
        ?  $this->allow()
        : $this->deny(' can not show index client');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Client $client)
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
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Edit-Client')
        ?  $this->allow()
        : $this->deny(' can not show create Client');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( )
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Edit-Client')
        ?  $this->allow()
        : $this->deny(' can not show Edit Client');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Delete-Client')
        ?  $this->allow()
        : $this->deny(' can not Delete client');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Client $client)
    {
        //
    }
}
