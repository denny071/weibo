<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * 用户侧率
 *
 * Class UserPolicy
 * @package App\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * 更新策略
     *
     * @param User $currentUser
     * @param User $user
     * @return bool
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    /**
     * 删除策略
     *
     * @param User $currentUser
     * @param User $user
     * @return bool
     */
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    /**
     * 关注策略
     *
     * @param User $currentUser
     * @param User $user
     * @return bool
     */
    public function follow(User $currentUser, User $user)
    {
        return $currentUser->id !== $user->id;
    }
}
