<?php
/**
 * API.Token权限中间件
 * 用户信息通过 $request传给控制器
 * 修改记录:
 *
 * $Id$
 */

namespace App\Http\Middleware;

use App\User;
use Closure;

class TokenAuth
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles=FALSE, $permissions=FALSE, $validateAll = FALSE)
    {
        if(!$request->user) {
            $tokenData = getAuthToken($request);
            if (!$tokenData) {
                return error(40, 'Token不正确');
            }
            $uid = $tokenData['uid'];
            $user = User::find($uid);
            if (!$user) {
                return $this->error(404,'未找到该用户');
            }
            $request->user=$user;
        }

        if (($roles || $permissions)  && !$request->user->ability(explode('|', $roles), explode('|', $permissions),
            ['validate_all' => $validateAll])
        ){
            return error(403,'你没有权限');
        }

        return $next($request);
    }

}