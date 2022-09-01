<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
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
            return auth()->user()->hasPermissionTo('Index-Review')
             ?  $this->allow()
             : $this->deny(' can not open Index-Review');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Index-Review')
             ?  $this->allow()
             : $this->deny(' can not open Index-Review');
         }else{
           return  auth()->user()->hasPermissionTo('Index-Review')
             ?  $this->allow()
             : $this->deny(' can not open Index-Review');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Review $review)
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
            return auth()->user()->hasPermissionTo('Create-Review')
             ?  $this->allow()
             : $this->deny(' can not open Create-Review');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Create-Review')
             ?  $this->allow()
             : $this->deny(' can not open Create-Review');
         }else{
           return  auth()->user()->hasPermissionTo('Create-Review')
             ?  $this->allow()
             : $this->deny(' can not open Create-Review');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Review')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Review');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Edit-Review')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Review');
         }else{
           return  auth()->user()->hasPermissionTo('Edit-Review')
             ?  $this->allow()
             : $this->deny(' can not open Edit-Review');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Review')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Review');
         }elseif(auth('dentist')->check()){
            return auth()->user()->hasPermissionTo('Delete-Review')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Review');
         }else{
           return  auth()->user()->hasPermissionTo('Delete-Review')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Review');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Review $review)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Review $review)
    {
        //
    }
}
