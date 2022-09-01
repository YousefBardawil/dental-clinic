<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
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
            return auth()->user()->hasPermissionTo('Index-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Index-Appointment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Index-Appointment');
         }else{
           return  auth()->user()->hasPermissionTo('Index-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Index-Appointment');
         }

        // $guard = auth('admin')->check() ? 'admin':'dentist';
        // return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Index-Appointment')
        // ?  $this->allow()
        // : $this->deny(' can not show Index Appointment');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view()
    {
        
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
            return auth()->user()->hasPermissionTo('Create-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Create-Appointment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Create-Appointment');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Create-Appointment');
         }

        // $guard = auth('admin')->check() ? 'admin':'dentist';
        // return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Create-Appointment')
        // ?  $this->allow()
        // : $this->deny(' can not show Create Appointment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Appointment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Appointment');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Appointment');
         }


    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Appointment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Appointment');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Appointment')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Appointment');
         }


    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Appointment $appointment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Appointment $appointment)
    {
        //
    }
}
