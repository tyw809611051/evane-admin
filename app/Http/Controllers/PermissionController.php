<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Permission;
use App\Role;

class PermissionController extends Controller
{
	public function add(Request $request)
	{
		// $createPost = new Permission();
		// $createPost->name = 'create-feature';
		// $createPost->display_name = 'Create Feature';
		// $createPost->desc = 'create new blog posts';
		// $createPost->save();
		// $data = [
		// 	'name' => 'create-feature',
		// 	'display_name' => 'Create Feature',
		// 	'desc' => 'create new blog posts'
		// ];
		// DB::table('permission')->insert($data);

		// $owner->attachPermission($createPost);
		//等价于 $owner->perms()->sync(array($createPost->id));
		// $admin = Role::where('id',1)->first();
		// $createPost = Permission::where('id',1)->first();
		// $admin->attachPermission($createPost);
		//等价于 $admin->perms()->sync(array($createPost->id, $editUser->id));

		// $user->hasRole('owner'); // false
		// $user->hasRole('admin'); // true
		// $user->can('edit-user'); // true
		// $user->can('create-post'); // true
		// hasRole()和can都可以接收数组形式的角色和权限进行检查：

		// $user->hasRole(['owner', 'admin']); // true
		// $user->can(['edit-user', 'create-post']); // true
		// 默认情况下，如果用户拥有以上任意一个角色或权限都会返回true，如果你想检查用户是否拥有所有角色及权限，可以传递true作为第二个参数到相应方法：

		// $user->hasRole(['owner', 'admin']); // true
		// $user->hasRole(['owner', 'admin'], true); // false
		// $user->can(['edit-user', 'create-post']); // true
		// $user->can(['edit-user', 'create-post'], true); // false
		// 用户可以拥有多个角色。

		// 除此之外，还可以通过Entrust门面检查当前登录用户是否拥有指定角色和权限：

		// Entrust::hasRole('role-name');
		// Entrust::can('permission-name');
		// 甚至还可以通过通配符的方式来检查用户权限：

		// // match any admin permission
		// $user->can("admin.*"); // true

		// // match any permission about users
		// $user->can("*_users"); // true
	}
}