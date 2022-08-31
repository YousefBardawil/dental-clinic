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
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Index-MedicalHistory')
        ?  $this->allow()
        : $this->deny('can not show Index-MedicalHistory');
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
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Create-MedicalHistory')
        ?  $this->allow()
        : $this->deny('can not show Create-MedicalHistory');
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
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Edit-MedicalHistory')
        ?  $this->allow()
        : $this->deny('can not show Edit-MedicalHistory');
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
        $guard = auth('admin')->check() ? 'admin':'dentist';
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Delete-MedicalHistory')
        ?  $this->allow()
        : $this->deny('can not show Delete-MedicalHistory');
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
