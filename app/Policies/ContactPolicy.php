<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
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
            return auth()->user()->hasPermissionTo('Index-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Index-ContactUs');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Index-ContactUs');
         }else{
           return  auth()->user()->hasPermissionTo('Index-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Index-ContactUs');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Contact $contact)
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
            return auth()->user()->hasPermissionTo('Create-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Create-ContactUs');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Create-ContactUs');
         }else{
           return  auth()->user()->hasPermissionTo('Create-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Create-ContactUs');
         }

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Edit-ContactUs');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Edit-ContactUs');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Edit-ContactUs');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Delete-ContactUs');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Delete-ContactUs');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-ContactUs')
             ?  $this->allow()
             : $this->deny(' can not open Delete-ContactUs');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Contact $contact)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Contact $contact)
    {
        //
    }
}
