<?php

namespace App\Policies;

use App\Models\Medical_history;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalHistoryPolicy
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
            return auth()->user()->hasPermissionTo('Index-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Index-MedicalHistory');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Index-MedicalHistory');
         }else{
           return  auth()->user()->hasPermissionTo('Index-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Index-MedicalHistory');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medical_history  $medicalHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Medical_history $medicalHistory)
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
            return auth()->user()->hasPermissionTo('Create-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Create-MedicalHistory');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Create-MedicalHistory');
         }else{
           return  auth()->user()->hasPermissionTo('Create-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Create-MedicalHistory');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medical_history  $medicalHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Edit-MedicalHistory');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Edit-MedicalHistory');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Edit-MedicalHistory');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medical_history  $medicalHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Delete-MedicalHistory');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Delete-MedicalHistory');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-MedicalHistory')
             ?  $this->allow()
             : $this->deny(' can not open Delete-MedicalHistory');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medical_history  $medicalHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Medical_history $medicalHistory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medical_history  $medicalHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Medical_history $medicalHistory)
    {
        //
    }
}
