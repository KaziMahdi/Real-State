<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class TaskController extends Controller{
	public function index(){
		
		$tasks=DB::table("tasks as t")       
		->join("users as e","t.user_id","=","e.id")
		->join("projects as p","t.project_id","=","p.id")
        ->select("t.id","t.name","p.name as project_id","e.name as user_id","t.locations","t.status","t.start_time","t.end_time","t.created_at","t.updated_at")		
        
		->paginate(25);

		return view("pages.erp.task.index",["tasks"=>$tasks]);
	}
	
	public function create(){
		return view("pages.erp.task.create",["projects"=>Project::all(),"users"=>User::all()]);
	}
	public function store(Request $request){
		//Task::create($request->all());
		$task = new Task;
		$task->name=$request->name;
		$task->project_id=$request->project_id;
		$task->locations=$request->locations;
		$task->status=$request->status;
		$task->user_id=$request->user_id;
		$task->start_time=$request->start_time;
		$task->end_time=$request->end_time;
date_default_timezone_set("Asia/Dhaka");
		$task->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$task->updated_at=date('Y-m-d H:i:s');

		$task->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$tasks=DB::table("tasks as t")

		->join("users as e","t.user_id","=","e.id")
		->join("projects as p","t.project_id","=","p.id")
		->where('t.id', $id)
        ->select("t.id","t.name","e.name as user_id","p.name as project_id","t.start_time","t.end_time","t.locations","t.status","t.created_at","t.updated_at")
		->first();
	
		return view("pages.erp.task.show",["task"=>$tasks]);
	}
	public function edit(Task $task){
		return view("pages.erp.task.edit",["task"=>$task,"projects"=>Project::all(),"users"=>User::all()]);
	}
	public function update(Request $request,Task $task){
		//Task::update($request->all());
		$task = Task::find($task->id);
		$task->name=$request->name;
		$task->project_id=$request->project_id;
		$task->locations=$request->locations;
		$task->status=$request->status;
		$task->user_id=$request->user_id;
		$task->start_time=$request->start_time;
		$task->end_time=$request->end_time;
date_default_timezone_set("Asia/Dhaka");
		$task->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$task->updated_at=date('Y-m-d H:i:s');

		$task->save();

		return redirect()->route("tasks.index")->with('success','Updated Successfully.');
	}
	public function destroy(Task $task){
		$task->delete();
		return redirect()->route("tasks.index")->with('success', 'Deleted Successfully.');
	}
}
?>
