<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Supplier;

use App\Models\Stock;
use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PurchaseController extends Controller
{
	public function index()
	{
		$purchases = DB::table("purchases as p")

			->join("suppliers as s", "p.supplier_id", "=", "s.id")
			->select("p.id", "s.name as supplier", "p.purchase_date", "p.delivery_date", "p.shipping_address", "p.purchase_total", "p.remark", "p.paid_amount", "p.vat", "p.discount", "p.created_at", "p.updated_at")
			->latest()
			->paginate(15);
		return view("pages.erp.purchase.index", ["purchases" => $purchases]);
	}
	public function create()
	{
		return view("pages.erp.purchase.create", ["suppliers" => Supplier::all(), "uoms" => Uom::all(), "products" => Product::all(),"projects"=>Project::all()]);
	}
	public function store(Request $request)
	{

		//Purchase::create($request->all());
		$purchase = new Purchase;
		$purchase->supplier_id = $request->supplier_id;
		$purchase->project_id = $request->project_id;
		$purchase->purchase_date = $request->purchase_date;
		$purchase->delivery_date = $request->delivery_date;
		$purchase->shipping_address = $request->shipping_address;
		$purchase->purchase_total = $request->purchase_total;
		$purchase->paid_amount = $request->paid_amount;
		$purchase->remark = $request->remark;

		$purchase->discount = $request->discount;
		$purchase->vat = $request->vat;
		date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at = date('Y-m-d H:i:s');

		$purchase->save();

		$detailpurchase = $request->purchase;
		foreach ($detailpurchase as $detailpurchas) {

			$purchaseDetails = new PurchaseDetail;
			$purchaseDetails->purchase_id = $purchase->id;
			$purchaseDetails->product_id = $detailpurchas['product_id'];
			$purchaseDetails->qty = $detailpurchas['qty'];
			$purchaseDetails->price = $detailpurchas['price'];
			$purchaseDetails->uom_id = $detailpurchas['uom_id'];
			$purchaseDetails->vat = 0;
			$purchaseDetails->discount = $detailpurchas['discount'];

			$purchaseDetails->save();

			$stock = new Stock;
			$stock->product_id = $detailpurchas['product_id'];
			$stock->qty = $detailpurchas['qty'];
			$stock->uom_id = $detailpurchas['uom_id'];
			$stock->transaction_type = 'Purchase';

			$stock->save();
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$purchase = Purchase::find($id);
		$supplier = Supplier::find($purchase->supplier_id);


		$detailspurchases = DB::table("purchase_details")
			->where("purchase_id", $id)
			->get();

		$detailspurchases = DB::table("purchase_details as p")
			->join("products as m", "p.product_id", "=", "m.id")
			->join("uoms as u", "p.uom_id", "=", "u.id")
			->where("p.purchase_id", $id)
			->select("p.*", "m.name as mname", "u.name as uname")
			->get();
		return view("pages.erp.purchase.show", ["purchase" => $purchase, "supplier" => $supplier, "detailspurchases" => $detailspurchases]);
	}
	public function edit(Purchase $purchase)
	{
		return view("pages.erp.purchase.edit", ["purchase" => $purchase, "suppliers" => Supplier::all(), "uoms" => Uom::all(), "products" => Product::all()]);
	}
	public function update(Request $request, Purchase $purchase)
	{
		$purchase->update([
			'supplier_id' => $request->supplier_id,
			'purchase_date' => $request->purchase_date,
			'delivery_date' => $request->delivery_date,
			'shipping_address' => $request->shipping_address,
			'purchase_total' => $request->purchase_total,
			'paid_amount' => $request->paid_amount,
			'remark' => $request->remark,
			'discount' => $request->discount,
			'vat' => $request->vat,
			'updated_at' => now(), // Use Laravel's helper function for current time
		]);

		$purchase->purchaseDetails()->delete();

		$detailPurchases = $request->purchase;

		foreach ($detailPurchases as $detailPurchase) {
			PurchaseDetail::create([
				'purchase_id' => $purchase->id,
				'product_id' => $detailPurchase['product_id'],
				'qty' => $detailPurchase['qty'],
				'price' => $detailPurchase['price'],
				'uom_id' => $detailPurchase['uom_id'],
				'vat' => 0,
				'discount' => $detailPurchase['discount'],
			]);

			Stock::create([
				'product_id' => $detailPurchase['product_id'],
				'qty' => $detailPurchase['qty'],
				'uom_id' => $detailPurchase['uom_id'],
				'transaction_type' => 'Purchase',
			]);
		}

		return redirect()->route("purchases.index")->with('success', 'Updated Successfully.');
	}

	public function destroy(Purchase $purchase)
	{
		$purchase->delete();
		return redirect()->route("purchases.index")->with('success', 'Deleted Successfully.');
	}
}
