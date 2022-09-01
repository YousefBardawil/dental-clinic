<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
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
            return auth()->user()->hasPermissionTo('Index-Service')
             ?  $this->allow()
             : $this->deny(' can not open Index-Service');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-Service')
             ?  $this->allow()
             : $this->deny(' can not open Index-Service');
         }else{
           return  auth()->user()->hasPermissionTo('Index-Service')
             ?  $this->allow()
             : $this->deny(' can not open Index-Service');
         }

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Service $service)
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
            return auth()->user()->hasPermissionTo('Create-Service')
             ?  $this->allow()
             : $this->deny(' can not open Create-Service');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Service')
             ?  $this->allow()
             : $this->deny(' can not open Create-Service');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Service')
             ?  $this->allow()
             : $this->deny(' can not open Create-Service');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Service')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Service');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Service')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Service');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Service')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Service');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Service')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Service');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Service')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Service');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Service')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Service');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Service $service)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Service $service)
    {
        //
    }
}
