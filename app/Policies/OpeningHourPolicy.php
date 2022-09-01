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

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Index-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Index-OpeningHour');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Index-OpeningHour');
         }else{
           return  auth()->user()->hasPermissionTo('Index-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Index-OpeningHour');
         }
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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Create-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Create-OpeningHour');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Create-OpeningHour');
         }else{
           return  auth()->user()->hasPermissionTo('Create-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Create-OpeningHour');
         }
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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Edit-OpeningHour');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Edit-OpeningHour');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Edit-OpeningHour');
         }

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
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Delete-OpeningHour');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Delete-OpeningHour');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-OpeningHour')
             ?  $this->allow()
             : $this->deny(' can not open Delete-OpeningHour');
         }
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
