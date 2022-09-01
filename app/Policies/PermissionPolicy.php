<?php

namespace App\Policies;

use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
            return auth()->user()->hasPermissionTo('Index-permission')
             ?  $this->allow()
             : $this->deny(' can not open Index-permission');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-permission')
             ?  $this->allow()
             : $this->deny(' can not open Index-permission');
         }else{
           return  auth()->user()->hasPermissionTo('Index-permission')
             ?  $this->allow()
             : $this->deny(' can not open Index-permission');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Permission $permission)
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
            return auth()->user()->hasPermissionTo('Create-permission')
             ?  $this->allow()
             : $this->deny(' can not open Create-permission');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-permission')
             ?  $this->allow()
             : $this->deny(' can not open Create-permission');
         }else{
           return  auth()->user()->hasPermissionTo('Create-permission')
             ?  $this->allow()
             : $this->deny(' can not open Create-permission');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-permission')
             ?  $this->allow()
             : $this->deny(' can not open Edit-permission');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-permission')
             ?  $this->allow()
             : $this->deny(' can not open Edit-permission');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-permission')
             ?  $this->allow()
             : $this->deny(' can not open Edit-permission');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-permission')
             ?  $this->allow()
             : $this->deny(' can not open Delete-permission');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-permission')
             ?  $this->allow()
             : $this->deny(' can not open Delete-permission');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-permission')
             ?  $this->allow()
             : $this->deny(' can not open Delete-permission');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
