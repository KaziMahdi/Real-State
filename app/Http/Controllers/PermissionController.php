<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class PermissionController extends Controller{
	public function index(){
		$permissions = Permission::paginate(10);
		return view("pages.erp.permission.index",["permissions"=>$permissions]);
	}
	public function create(){
		return view("pages.erp.permission.create",[]);
	}
	public function store(Request $request){
		//Permission::create($request->all());
		$permission = new Permission;
		$permission->name=$request->name;
		$permission->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$permission->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$permission->updated_at=date('Y-m-d H:i:s');

		$permission->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$permission = Permission::find($id);
		return view("pages.erp.permission.show",["permission"=>$permission]);
	}
	public function edit(Permission $permission){
		return view("pages.erp.permission.edit",["permission"=>$permission,]);
	}
	public function update(Request $request,Permission $permission){
		//Permission::update($request->all());
		$permission = Permission::find($permission->id);
		$permission->name=$request->name;
		$permission->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$permission->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$permission->updated_at=date('Y-m-d H:i:s');

		$permission->save();

		return redirect()->route("permissions.index")->with('success','Updated Successfully.');
	}
	public function destroy(Permission $permission){
		$permission->delete();
		return redirect()->route("permissions.index")->with('success', 'Deleted Successfully.');
	}
}
?>
