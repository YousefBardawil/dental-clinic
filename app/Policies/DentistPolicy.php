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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Index-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Index-Dentist');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Index-Dentist');
         }else{
           return  auth()->user()->hasPermissionTo('Index-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Index-Dentist');
         }
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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Create-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Create-Dentist');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Create-Dentist');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Create-Dentist');
         }
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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Dentist');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Dentist');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Dentist');
         }
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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Dentist');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Dentist');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Dentist')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Dentist');
         }
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
