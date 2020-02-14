<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ManageRoutesController;
use Illuminate\Support\Facades\DB;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request){
        //
    }
    public function __construct(){
        $this->middleware('CheckPermission');
    }
    public function dashboard(Request $request){
        $user=User::with('roles')->get();
        $roles = Role::all();
        return view('admin.dashboard',['page_title' => 'Dashboard','users'=>$user,'roles'=>$roles]);
    }
    public function roles(Request $request){
        $roles = DB::table('roles')
                ->orderBy('id', 'desc')
                ->paginate(10);
        return view('admin.roles_listing',['page_title' => 'Roles','roles'=>$roles]);
    }
    public function permissions(Request $request){
        $permissions = DB::table('permissions')
                ->orderBy('id', 'desc')
                ->get();

        $controllers = $this->get_All_Controllers();

        return view('admin.permissions_listing',['page_title' => 'Permissions','permissions'=>$permissions]);
    }
    public function add_role(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $role = new Role;
            $role->name = $data['role'];
            $role->guard_name = "web";
            $role->save();
            if(isset($data['permissions']) && !empty($data['permissions']) ){
                $role->syncPermissions($data['permissions']);
            }
            return redirect('admin/roles')->with('status', 'New Role  added!');
        }
        $controllers = $this->get_All_Controllers();
        /*$permissions = Permission::all();*/
        return view('admin.add_role',['page_title' => 'Add Role','controllers'=>$controllers]);
    }
    public function get_All_Controllers(){
        $controllerOBJ = new ManageRoutesController;
        $controllers = $controllerOBJ->getAllControllers();
        return $controllers;
    }
    public function edit_role(Request $request,$role_id=''){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $role = Role::find($role_id);
            $role->name = $data['role'];
            $role->save();
            if(isset($data['permissions']) && !empty($data['permissions']) ){
                $role->syncPermissions($data['permissions']);
            }
            return redirect('admin/roles')->with('status', 'Role updated!');
        }
        $role = Role::find($role_id);
        $permissions = Permission::all();
        return view('admin.edit_role',['page_title' => 'Add Role','role_id'=>$role_id,'role'=>$role,'permissions'=>$permissions]);
    }
    public function delete_role(Request $request,$role_id=''){
        $role = Role::find($role_id);
        $role->delete();
        return redirect('admin/roles')->with('status', 'Role Deleted');
    }

    public function update_permissions(Request $request){
        $controllers = $this->get_All_Controllers();
        foreach($controllers as $con){
            $permissionArray = DB::table('permissions')->where('name',$con['controller'].'_'.$con['action'])->get();
            
            if($permissionArray->isEmpty()){
                $permission = new Permission;
                $permission->name = $con['controller'].'_'.$con['action'];
                $permission->guard_name = "web";
                $permission->save();
            }
            else{
                
            }
        }
        return redirect('admin/permissions')->with('status', 'Permissions updated!');
    }

    public function edit_permission(Request $request,$permission_id=''){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $permission = Permission::find($permission_id);
            $permission->name = $data['name'];
            $permission->save();
            return redirect('admin/permissions')->with('status', 'Permission updated!');
        }
        $permission = DB::table('permissions')->where('id', $permission_id)->first();
        return view('admin.edit_permission',['page_title' => 'Add Permission','permission_id'=>$permission_id,'permission'=>$permission]);
    }
    public function delete_permission(Request $request,$permission_id=''){
        $permission = Permission::find($permission_id);
        $permission->delete();
        return redirect('admin/permissions')->with('status', 'Permission Deleted');
    }

    public function save_user_role(Request $request){
        $data = $request->all();
        $user = User::find($data['id']);
        if($data['old_role']){
            $user->removeRole($data['old_role']);
        }
        $user->assignRole($data['value']);
        echo "success";
        die;
    }
}
