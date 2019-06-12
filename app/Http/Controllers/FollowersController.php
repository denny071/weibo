<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 粉丝管理
 *
 * Class FollowersController
 * @package App\Http\Controllers
 */
class FollowersController extends Controller
{

    public function __construct()
    {
        //认证中间件
        $this->middleware('auth');
    }

    /**
     * 添加粉丝
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(User $user)
    {
        //用户认证
        $this->authorize('follow', $user);
        if (!Auth::user()->isFollowing($user->id)) {
            Auth::user()->follow($user->id);
        }
        //重定向
        return redirect()->route('users.show', $user->id);
    }

    /**
     * 删除粉丝
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $user)
    {
        //用户认证
        $this->authorize('follow', $user);
        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }
        //重定向
        return redirect()->route('users.show', $user->id);
    }
}
