<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class CategoryController extends Controller{
	public function index(){
		$categorys = Category::paginate(10);
		return view("pages.erp.category.index",["categorys"=>$categorys]);
	}
	public function create(){
		return view("pages.erp.category.create",["departments"=>Department::all()]);
	}
	public function store(Request $request){
		//Category::create($request->all());
		$category = new Category;
		$category->name=$request->name;
		$category->department_id=$request->department_id;
date_default_timezone_set("Asia/Dhaka");
		$category->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$category->updated_at=date('Y-m-d H:i:s');

		$category->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$category = Category::find($id);
		return view("pages.erp.category.show",["category"=>$category]);
	}
	public function edit(Category $category){
		return view("pages.erp.category.edit",["category"=>$category,"departments"=>Department::all()]);
	}
	public function update(Request $request,Category $category){
		//Category::update($request->all());
		$category = Category::find($category->id);
		$category->name=$request->name;
		$category->department_id=$request->department_id;
date_default_timezone_set("Asia/Dhaka");
		$category->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$category->updated_at=date('Y-m-d H:i:s');

		$category->save();

		return redirect()->route("categories.index")->with('success','Updated Successfully.');
	}
	public function destroy(Category $category){
		$category->delete();
		return redirect()->route("categories.index")->with('success', 'Deleted Successfully.');
	}
}
?>
