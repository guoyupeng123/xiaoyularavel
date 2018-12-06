<?php

namespace App\Http\Controllers\Role;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
//  获取权限列表
    public function index(){
        hdcon('Role-permission');
        $modules = Module::all();
        return view('role.permission.index',compact('modules'));
    }
    //清除权限缓存
    public function forgetPermissionCache(){
        hdcon('Role-permission');
        app()['cache']->forget('spatie.permission.cache');
        return back()->with('success','缓存清除成功');
    }
}
