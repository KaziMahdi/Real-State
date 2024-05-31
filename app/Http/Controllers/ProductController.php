<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Uom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
	public function index()
	{

		$products = DB::table("products as p")
			->join("suppliers as s", "p.supplier_id", "=", "s.id")
			->join("categories as c", "p.category_id", "=", "c.id")
			->join("uoms as u", "p.uom_id", "=", "u.id")
			->select(
				"p.id",
				"p.name",
				"p.offer_price",
				"p.regular_price",
				"s.name as supplier_id",
				"p.description",
				'p.photo',
				"c.name as category_id",
				"u.name as uom_id",
				"p.is_featured",
				"p.star",
				'p.is_brand',
				"p.offer_discount",
				"p.weight",
				"p.barcode",
				"p.created_at",
				"p.updated_at"
			)

			->paginate(15);
		return view("pages.erp.product.index", ["products" => $products, "suppliers" => Supplier::all(), "categories" => Category::all(), "uoms" => Uom::all()]);
	}



	public function create()
	{
		return view("pages.erp.product.create", ["suppliers" => Supplier::all(), "categories" => Category::all(), "uom" => Uom::all()]);
	}
	public function store(Request $request)
	{
		//Product::create($request->all());
		$product = new Product;
		$product->name = $request->name;
		$product->offer_price = $request->offer_price;
		$product->supplier_id = $request->supplier_id;
		$product->regular_price = $request->regular_price;
		$product->description = $request->description;
		if (isset($request->photo)) {
			$product->photo = $request->photo;
		}
		$product->category_id = $request->category_id;
		$product->uom_id = $request->uom_id;
		$product->is_featured = $request->is_featured;
		$product->star = $request->star;
		$product->is_brand = $request->is_brand;
		$product->offer_discount = $request->offer_discount;
		$product->weight = $request->weight;
		$product->barcode = $request->barcode;
		date_default_timezone_set("Asia/Dhaka");
		$product->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$product->updated_at = date('Y-m-d H:i:s');

		$product->save();
		if (isset($request->photo)) {
			$imageName = $product->name . '.' . $request->photo->extension();
			$product->photo = $imageName;
			$product->update();
			$request->photo->move(public_path('img/products'), $imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$product = Product::find($id);
		return view("pages.erp.product.show", ["product" => $product]);
	}
	public function edit(Product $product)
	{
		return view("pages.erp.product.edit", ["product" => $product, "suppliers" => Supplier::all(), "categories" => Category::all(), "uom" => Uom::all()]);
	}
	public function update(Request $request, Product $product)
	{
		//Product::update($request->all());
		$product = Product::find($product->id);
		$product->name = $request->name;
		$product->offer_price = $request->offer_price;
		$product->supplier_id = $request->supplier_id;
		$product->regular_price = $request->regular_price;
		$product->description = $request->description;
		if (isset($request->photo)) {
			$product->photo = $request->photo;
		}
		$product->category_id = $request->category_id;
		$product->uom_id = $request->uom_id;
		$product->is_featured = $request->is_featured;
		$product->star = $request->star;
		$product->is_brand = $request->is_brand;
		$product->offer_discount = $request->offer_discount;
		$product->weight = $request->weight;
		$product->barcode = $request->barcode;
		date_default_timezone_set("Asia/Dhaka");
		$product->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$product->updated_at = date('Y-m-d H:i:s');

		$product->save();
		if (isset($request->photo)) {
			$imageName = $product->name . '.' . $request->photo->extension();
			$product->photo = $imageName;
			$product->update();
			$request->photo->move(public_path('img/products'), $imageName);
		}

		return redirect()->route("products.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Product $product)
	{
		$product->delete();
		return redirect()->route("products.index")->with('success', 'Deleted Successfully.');
	}

	public function get_product_json(){
		
		$id=$_GET["id"];
		$request=Product::find($id);
		// $request=DB::table("materials as m")
		// ->join("uoms as u","m.uom_id","=","u.id")
		// ->where("m.id",$id)
		// ->select("m.*","u.name as uname")
		// ->get();
		return json_encode($request);

	}
}
