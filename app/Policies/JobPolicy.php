<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }
    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Job $job): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job): bool|Response
    {
        if ($user->id !== $job->employer->user_id) {
            return false;
        }

        if ($job->jobApplications()->count() > 0) {
            return Response::deny('This job has already been applied');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool
    {
        return $user->id === $job->employer->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Job $job): bool
    {
        return $user->id === $job->employer->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Job $job): bool
    {
        return $user->id === $job->employer->user_id;
    }

    public function apply(User $user, Job $job): bool
    {
        return !$job->hasUserApplied($user);
    }

    public function isOwner(User $user, Job $job): bool
    {
        return $user->id !== $job->employer->user_id;
    }
}
