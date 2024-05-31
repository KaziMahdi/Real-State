<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_StockAdjustmentDetailController.php" was generated by ProBot AI.
* Date: 1/19/2024 12:39:55 AM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StockAdjustmentDetail;
use App\Models\StockAdjustment;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StockAdjustmentDetailController extends Controller{
	public function index(){
	    
		$stockadjustmentdetails=DB::table("stock_adjustment_details as sad")
		->join("stock_adjustments as sa","sad.stock_adjustment_id","=","sa.id") 

		->join("products as p","sad.product_id","=","p.id") 
		
		->select("sad.id","sa.name as stock_adjustment_id","p.name as product_id","sad.qty","sad.price","sad.created_at","sad.updated_at")
		->paginate(10);
		return view("pages.erp.stockadjustmentdetail.index",["stockadjustmentdetails"=>$stockadjustmentdetails]);
	}
	public function create(){
		return view("pages.erp.stockadjustmentdetail.create",["stock_adjustments"=>StockAdjustment::all(),"products"=>Product::all()]);
	}
	public function store(Request $request){
		//StockAdjustmentDetail::create($request->all());
		$stockadjustmentdetail = new StockAdjustmentDetail;
		$stockadjustmentdetail->stock_adjustment_id=$request->stock_adjustment_id;
		$stockadjustmentdetail->product_id=$request->product_id;
		$stockadjustmentdetail->qty=$request->qty;
		$stockadjustmentdetail->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmentdetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmentdetail->updated_at=date('Y-m-d H:i:s');

		$stockadjustmentdetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$stockadjustmentdetail = DB::table("stock_adjustment_details as sad")
		->join("stock_adjustments as sa", "sad.stock_adjustment_id","=", "sa.id")
		
		->join("products as p", "sad.product_id", "=", "p.id")
		->select("sad.id", "sa.name as stock_adjustment_id","p.name as product_id","sad.qty","sad.price", "sad.created_at","sad.updated_at")
		->first();
		return view("pages.erp.stockadjustmentdetail.show",["stockadjustmentdetail"=>$stockadjustmentdetail]);
	}
	public function edit(StockAdjustmentDetail $stockadjustmentdetail){
		return view("pages.erp.stockadjustmentdetail.edit",["stockadjustmentdetail"=>$stockadjustmentdetail,"stock_adjustments"=>StockAdjustment::all(),"products"=>Product::all()]);
	}
	public function update(Request $request,StockAdjustmentDetail $stockadjustmentdetail){
		//StockAdjustmentDetail::update($request->all());
		$stockadjustmentdetail = StockAdjustmentDetail::find($stockadjustmentdetail->id);
		$stockadjustmentdetail->stock_adjustment_id=$request->stock_adjustment_id;
		$stockadjustmentdetail->product_id=$request->product_id;
		$stockadjustmentdetail->qty=$request->qty;
		$stockadjustmentdetail->price=$request->price;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmentdetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmentdetail->updated_at=date('Y-m-d H:i:s');

		$stockadjustmentdetail->save();

		return redirect()->route("stockadjustmentdetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(StockAdjustmentDetail $stockadjustmentdetail){
		$stockadjustmentdetail->delete();
		return redirect()->route("stockadjustmentdetails.index")->with('success', 'Deleted Successfully.');
	}
}
?>
