<?php

namespace App\Http\Controllers\Role;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin.auth',[
           'exceot'=>[]
        ]);
    }

    public function index(){
        hdcon('Role-user');
//        获得所有用户数据并分页
        $user = User::paginate(14);
//        dd($user);
        return view('role.user.index',compact('user'));
    }

    public function userSetRoleCreate(User $user){
        hdcon('Role-user');
        $role = Role::all();
//        dd($role->toArray());
        return view('role.user.set_permission',compact('user','role'));
    }

    public function userSetRoleStore(User $user,Request $request){
        hdcon('Role-user');
//        dd($request->toArray());
        $user->syncRoles($request->permissions);
//        给用户添加角色
        return redirect()->route('role.user.index')->with('success', '操作成功');
    }

    public function userSetRoleDelete(User $user){
        hdcon('Role-user');
        $user->delete();
        return back()->with('success', '操作成功');
    }
}
