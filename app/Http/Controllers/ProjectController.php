<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProjectController extends Controller{
	public function index(){
		
		
		$projects=DB::table("projects as p")

        ->join("departments as d","p.department_id","=","d.id")
		
		
        ->select("p.id","p.name","d.name as department_id","p.start_date","p.end_date","p.status","p.locations","p.photo","p.created_at","p.updated_at")		
        
		->paginate(25);
		return view("pages.erp.project.index",["projects"=>$projects]);





	}
	public function create(){
		return view("pages.erp.project.create",["departments"=>Department::all()]);
	}
	public function store(Request $request){
		//Project::create($request->all());
		$project = new Project;
		$project->name=$request->name;
		$project->department_id=$request->department_id;
		$project->start_date=$request->start_date;
		$project->end_date=$request->end_date;
		$project->status=$request->status;
		$project->locations=$request->locations;
		if(isset($request->photo)){
			$project->photo=$request->photo;
		}
date_default_timezone_set("Asia/Dhaka");
		$project->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$project->updated_at=date('Y-m-d H:i:s');

		$project->save();
		if(isset($request->photo)){
			$imageName=$project->id.'.'.$request->photo->extension();
			$project->photo=$imageName;
			$project->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		

		$project=DB::table("projects as p")

        ->join("departments as d","p.department_id","=","d.id")
		->where("p.id",$id)
        ->select("p.id","p.name","d.name as department_id","p.start_date","p.end_date","p.status","p.locations","p.photo","p.created_at","p.updated_at")		
		->first();
		return view("pages.erp.project.show",["project"=>$project]);
	}
	public function edit(Project $project){
		return view("pages.erp.project.edit",["project"=>$project,"departments"=>Department::all()]);
	}
	public function update(Request $request,Project $project){
		//Project::update($request->all());
		$project = Project::find($project->id);
		$project->name=$request->name;
		$project->department_id=$request->department_id;
		$project->start_date=$request->start_date;
		$project->end_date=$request->end_date;
		$project->status=$request->status;
		$project->locations=$request->locations;
		if(isset($request->photo)){
			$project->photo=$request->photo;
		}
date_default_timezone_set("Asia/Dhaka");
		$project->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$project->updated_at=date('Y-m-d H:i:s');

		$project->save();
		if(isset($request->photo)){
			$imageName=$project->id.'.'.$request->photo->extension();
			$project->photo=$imageName;
			$project->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("projects.index")->with('success','Updated Successfully.');
	}
	public function destroy(Project $project){
		$project->delete();
		return redirect()->route("projects.index")->with('success', 'Deleted Successfully.');
	}
}
?>
