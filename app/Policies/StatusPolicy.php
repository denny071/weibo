<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * 微博策略
 *
 * Class StatusPolicy
 * @package App\Policies
 */
class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 验证删除策略
     *
     * @param User $user
     * @param Status $status
     * @return bool
     */
    public function destroy(User $user, Status $status)
    {
        return $user->id === $status->user_id;
    }
}
