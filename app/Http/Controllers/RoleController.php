<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class RoleController extends Controller
{
	public function index()
	{

		$roles = Role::with('permissions')
			->join("role_permissions", "roles.id", "=", "role_permissions.role_id")
			->join("permissions", "role_permissions.permission_id", "=", "permissions.id")
			->select("roles.id", "roles.name", "roles.created_at", "roles.updated_at")
			->distinct()  // Ensure distinct roles
			->paginate(10);

		// Debugging statement
		// dd($roles);

		return view("pages.erp.role.index", ["roles" => $roles, "permissions" => Permission::all()]);
	}
	public function create()
	{
		return view("pages.erp.role.create", ["permissions" => Permission::all()]);
	}
	public function store(Request $request)
	{
		$existingRole = Role::where('name', $request->name)->first();

		if ($existingRole) {
			// If the role already exists, sync the permissions and return
			$existingRole->permissions()->sync($request->permissions);
			return back()->with('success', 'Permissions synced successfully.');
		}
		// If the role doesn't exist, create a new one
		$role = new Role;
		$role->name = $request->name;

		date_default_timezone_set("Asia/Dhaka");
		$role->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$role->updated_at = date('Y-m-d H:i:s');

		$role->save();
		$role->permissions()->sync($request->permissions);
		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$role = Role::with('permissions')->find($id);
		$permissions = Permission::all();

		return view("pages.erp.role.show", ["role" => $role, "permissions" => $permissions]);
	}
	public function edit(Role $role)
	{
		return view("pages.erp.role.edit", ["role" => $role, "permissions" => Permission::all()]);
	}
	public function update(Request $request, Role $role)
	{

		$role = Role::find($role->id);
		$role->name = $request->name;

		date_default_timezone_set("Asia/Dhaka");
		$role->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$role->updated_at = date('Y-m-d H:i:s');

		$role->save();
		$role->permissions()->sync($request->permissions);
		return redirect()->route("roles.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Role $role)
	{
		$role->delete();
		return redirect()->route("roles.index")->with('success', 'Deleted Successfully.');
	}
}
