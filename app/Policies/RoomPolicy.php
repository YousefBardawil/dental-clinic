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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Index-Room')
             ?  $this->allow()
             : $this->deny(' can not open Index-Room');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-Room')
             ?  $this->allow()
             : $this->deny(' can not open Index-Room');
         }else{
           return  auth()->user()->hasPermissionTo('Index-Room')
             ?  $this->allow()
             : $this->deny(' can not open Index-Room');
         }

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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Create-Room')
             ?  $this->allow()
             : $this->deny(' can not open Create-Room');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Room')
             ?  $this->allow()
             : $this->deny(' can not open Create-Room');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Room')
             ?  $this->allow()
             : $this->deny(' can not open Create-Room');
         }
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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Room')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Room');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Room')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Room');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Room')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Room');
         }
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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Room')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Room');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Room')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Room');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Room')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Room');
         }
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
