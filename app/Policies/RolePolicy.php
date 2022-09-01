<?php

namespace App\Policies;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
           return auth()->user()->hasPermissionTo('Index-Role')
            ?  $this->allow()
            : $this->deny(' can not open INDEX-ROLE');
        }elseif(auth('dentist')->check()){
           return auth()->user()->hasPermissionTo('Index-Role')
            ?  $this->allow()
            : $this->deny(' can not open INDEX-ROLE');
        }else{
          return  auth()->user()->hasPermissionTo('Index-Role')
            ?  $this->allow()
            : $this->deny(' can not open INDEX-ROLE');
        }

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Role $role)
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
            return auth()->user()->hasPermissionTo('Create-Role')
             ?  $this->allow()
             : $this->deny(' can not open Create-ROLE');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Role')
             ?  $this->allow()
             : $this->deny(' can not open Create-ROLE');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Role')
             ?  $this->allow()
             : $this->deny(' can not open Create-ROLE');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Role')
             ?  $this->allow()
             : $this->deny(' can not open Edit-ROLE');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Role')
             ?  $this->allow()
             : $this->deny(' can not open Edit-ROLE');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Role')
             ?  $this->allow()
             : $this->deny(' can not open Edit-ROLE');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Role')
             ?  $this->allow()
             : $this->deny(' can not open Delete-ROLE');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Role')
             ?  $this->allow()
             : $this->deny(' can not open Delete-ROLE');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Role')
             ?  $this->allow()
             : $this->deny(' can not open Delete-ROLE');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
