<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class UserController extends Controller

{
	public function __construct()
	{
		$this->middleware('App\Http\Middleware\CustomAuth');
	}
	public function index()

	{
		// Retrieve user role and permissions
		$userRole = session('sess_user_role_name');
		$userPermissions = Role::where('name', $userRole)->first()->permissions->pluck('name')->toArray();

		// Check if the user has permission to manage users
		if (in_array('Manage User', $userPermissions)) {
			$users = DB::table("users as u")
				->join("roles as r", "u.role_id", "=", "r.id")
				->join("departments as d", "u.department_id", "=", "d.id")
				->select("u.id", "u.name", "u.username", "u.email", "u.phone", "u.password", "u.address", "r.name as role_id", 'u.status', "d.name as department_id", "u.photo", "u.created_at", "u.updated_at")
				->paginate(10);

			return view("pages.erp.user.index", ["users" => $users]);
		} else {
			abort(403, 'Unauthorized');
		}
	}
	public function create()
	{
		return view("pages.erp.user.create", ["roles" => Role::all(), "departments" => Department::all()]);
	}
	public function store(Request $request)
	{
		$rules = [
			'name' => 'required',
			'username' => 'required|unique:users',
			'email' => 'required|email|unique:users',
			'password' => [
				'required',
				'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
			],

			// Add other validation rules for phone, address, etc.
		];

		$customMessages = [
			'username.unique' => 'The username is already taken.',
			'email.unique' => 'The email is already in use.',
			'password.regex' => 'Passwords must have at least 8 characters and contain at least two of the following: uppercase letters, lowercase letters, numbers, and symbols.',
			// Add custom error messages for other validation rules if needed.
		];
		$validator = Validator::make($request->all(), $rules, $customMessages);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}
		$user = new User;
		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->password = $request->password;
		$user->role_id = $request->role_id;
		$user->status = $request->status;
		$user->department_id = $request->department_id;
		if (isset($request->photo)) {
			$user->photo = $request->photo;
		}
		date_default_timezone_set("Asia/Dhaka");
		$user->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$user->updated_at = date('Y-m-d H:i:s');

		$user->save();
		if (isset($request->photo)) {
			$imageName = $user->username . '.' . $request->photo->extension();
			$user->photo = $imageName;
			$user->update();
			$request->photo->move(public_path('img'), $imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
public function show($id)
{
    $user = User::with(['role', 'department'])
        ->findOrFail($id);

    return view("pages.erp.user.show", ["user" => $user]);
}



	public function edit(User $user)
	{
		return view("pages.erp.user.edit", ["user" => $user, "roles" => Role::all(), "departments" => Department::all()]);
	}
	public function update(Request $request, User $user)
	{
		$rules = [
			'name' => 'required',
			'username' => 'required|unique:users,username,' . $user->id,
			'email' => 'required|email|unique:users,email,' . $user->id,
			'password' => [
				'required',
				'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
			],
			// Add other validation rules for phone, address, etc.
		];

		$customMessages = [
			'username.unique' => 'The username is already taken.',
			'email.unique' => 'The email is already in use.',
			'password.regex' => 'Passwords must have at least 8 characters and contain at least two of the following: uppercase letters, lowercase letters, numbers, and symbols.',
			// Add custom error messages for other validation rules if needed.
		];
		$validator = Validator::make($request->all(), $rules, $customMessages);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

		$user = User::findOrFail($user->id);
		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->password = $request->password;
		$user->role_id = $request->role_id;
		$user->status = $request->status;
		$user->department_id = $request->department_id;

		if ($request->hasFile('photo')) {
			$imageName = $user->username . '.' . $request->photo->extension();
			$request->photo->move(public_path('img'), $imageName);
			$user->photo = $imageName;
		}

		$user->save();

		return redirect()->route("users.index")->with('success', 'Updated Successfully.');
	}

	public function destroy(User $user)
	{
		$user->delete();
		return redirect()->route("users.index")->with('success', 'Deleted Successfully.');
	}
	public function toggleStatus(User $user)
	{
		$user->update(['status' => !$user->status]);

		return redirect()->back()->with('success', 'Status toggled successfully.');
	}

	public function get_user_json(){
        $id=$_GET["id"];     
        $request=User::find($id);
		
         return json_encode($request);
     }

}
