<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
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
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Index-Room')
        ?  $this->allow()
        : $this->deny(' can not show index Room');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Room $room)
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
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Create-Room')
        ?  $this->allow()
        : $this->deny(' can not show create Room');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Edit-Room')
        ?  $this->allow()
        : $this->deny(' can not show Edit Room');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Delete-Room')
        ?  $this->allow()
        : $this->deny(' can not Delete Room');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Room $room)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Room $room)
    {
        //
    }
}
