<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
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
            return auth()->user()->hasPermissionTo('Index-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Index-Payment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Index-Payment');
         }else{
           return  auth()->user()->hasPermissionTo('Index-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Index-Payment');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Payment $payment)
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
            return auth()->user()->hasPermissionTo('Create-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Create-Payment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Create-Payment');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Create-Payment');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Payment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Payment');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Payment');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Payment');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Payment');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Payment')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Payment');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Payment $payment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Payment $payment)
    {
        //
    }
}
