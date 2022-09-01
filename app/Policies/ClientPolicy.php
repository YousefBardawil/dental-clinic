<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Client;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
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
            return auth()->user()->hasPermissionTo('Index-Client')
             ?  $this->allow()
             : $this->deny(' can not open Index-Client');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-Client')
             ?  $this->allow()
             : $this->deny(' can not open Index-Client');
         }else{
           return  auth()->user()->hasPermissionTo('Index-Client')
             ?  $this->allow()
             : $this->deny(' can not open Index-Client');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Client $client)
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
            return auth()->user()->hasPermissionTo('Create-Client')
             ?  $this->allow()
             : $this->deny(' can not open Create-Client');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Client')
             ?  $this->allow()
             : $this->deny(' can not open Create-Client');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Client')
             ?  $this->allow()
             : $this->deny(' can not open Create-Client');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( )
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Client')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Client');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Client')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Client');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Client')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Client');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Client')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Client');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Client')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Client');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Client')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Client');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Client $client)
    {
        //
    }
}
