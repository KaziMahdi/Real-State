<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StatusController extends Controller{
	public function index(){
		$status = Status::paginate(10);
		return view("pages.erp.status.index",["status"=>$status]);
	}
	public function create(){
		return view("pages.erp.status.create",[]);
	}
	public function store(Request $request){
		//Status::create($request->all());
		$status = new Status;
		$status->name=$request->name;
		$status->descriptions=$request->descriptions;
date_default_timezone_set("Asia/Dhaka");
		$status->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$status->updated_at=date('Y-m-d H:i:s');

		$status->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$status = Status::find($id);
		return view("pages.erp.status.show",["status"=>$status]);
	}
	public function edit(Status $status){
		return view("pages.erp.status.edit",["status"=>$status,]);
	}
	public function update(Request $request,Status $status){
		//Status::update($request->all());
		$status = Status::find($status->id);
		$status->name=$request->name;
		$status->descriptions=$request->descriptions;
date_default_timezone_set("Asia/Dhaka");
		$status->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$status->updated_at=date('Y-m-d H:i:s');

		$status->save();

		return redirect()->route("status.index")->with('success','Updated Successfully.');
	}
	public function destroy(Status $status){
		$status->delete();
		return redirect()->route("status.index")->with('success', 'Deleted Successfully.');
	}
}
?>
