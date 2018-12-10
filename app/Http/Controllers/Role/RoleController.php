<?php

namespace App\Http\Controllers\Role;

use App\Models\Module;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller{

    public function __construct(){
        $this->middleware('admin.auth',[
            'except'=>[],
        ]);
    }

    public function index(){
        hdcon('Role-role');
        $role = Role::all();
        return view('role.role.index',compact('role'));
    }

    public function create(){
        hdcon('Role-role');
        return view('role.role.create');
    }

    public function store(Request $request,Role $role){
        hdcon('Role-role');
//        dd($request->all());
        $role['title'] = $request['title'];
        $role['name'] = $request['name'];
        $role->save();
        return redirect()->route('role.role.index')->with('success','添加成功');
    }


    public function edit(Role $role){
        hdcon('Role-role');
//        dd($role->toArray());
        return view('role.role.edit',compact('role'));
    }

    public function update(Request $request, Role $role){
        hdcon('Role-role');
        $role->update($request->all());
        return redirect()->route('role.role.index')->with('success','修改成功');
    }


    public function destroy(Role $role){
        hdcon('Role-role');
        $role->delete();
        return redirect()->route('role.role.index')->with('success','删除成功');
    }



    public function show(Role $role){
        hdcon('Role-role');
//      获取所有模块以及权限,获取的 modules 所有数据
        $modules = Module::all();
//        dump($modules->toArray());
        return view('role.role.set_permission',compact('modules','role'));
    }

    public function setRolePermission(Role $role,Request $response){
        hdcon('Role-role');
//      dd($response->toArray());
        $role->syncPermissions($response->permissions);
        return redirect()->route('role.role.index')->with('success', '操作成功');
    }
}
