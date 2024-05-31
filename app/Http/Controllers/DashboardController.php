<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Product;
use App\Models\RequisitionDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
    
     //     $purchase = DB::table('purchases')
    //     ->whereDate('purchase_date', '=', date('Y-m-d')) // Ensure date format matches with 'purchase_date' format
    //     ->sum('purchase_total');

    //     $purchasedetails = DB::table('purchase_details')
    //     ->join('purchases', 'purchase_details.purchase_id', '=', 'purchases.id')
    //     ->join('products', 'purchase_details.product_id', '=', 'products.id')

    //     ->whereDate('purchase_details.created_at', DB::raw('CURDATE()'))
    //     ->join('uoms', 'purchase_details.uom_id', '=', 'uoms.id')
    //     ->select(
    //         'purchase_details.*',
    //         'purchases.paid_amount',
    //         'products.name as pname',
    //         'uoms.name as unit', // Use 'uoms.name' instead of 'products.unit'
    //         'uoms.name as uname'
    //     )
    //     ->get();

    // $total = DB::table('products')
    // ->whereDate('created_at', DB::raw('CURDATE()'))
    // ->sum('regular_price');

    // $products = [];
    // foreach ($purchasedetails as $detail) {
    //     $productId = $detail->product_id;
    //     if (!isset($products[$productId])) {
    //         $products[$productId] = [
    //             'product_name' => $detail->pname,
    //             'qty' => 0,
    //         ];
    //     }
    //     $products[$productId]['qty'] += $detail->qty;
    // }

    // // Determine if product is in stock or out of stock
    // foreach ($products as &$product) {
    //     if ($product['qty'] > 0) {
    //         $product['availability'] = 'In Stock';
    //     } else {
    //         $product['availability'] = 'Out of Stock';
    //     }
    // }

    //     $stockStatus = Stock::with(['product', 'uom'])
    //         ->select('product_id', 'uom_id', \DB::raw('SUM(qty) as total_qty'))
    //         ->groupBy('product_id', 'uom_id')
    //         ->get();

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();
    $currentMonthName = Carbon::now()->format('F');
    $requisitions = RequisitionDetail::select('project_id', 'product_id', 'uom_id', DB::raw('SUM(qty) as total_qty'))
    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
    ->groupBy('project_id', 'product_id', 'uom_id')
    ->with(['project', 'product', 'uom']) // Eager load the relationships
    ->get();



    $purchasedetails = PurchaseDetail::with(['purchase.project', 'product', 'uom'])
    ->join('purchases', 'purchase_details.purchase_id', '=', 'purchases.id')
    ->join('projects', 'purchases.project_id', '=', 'projects.id')
    ->select(
        'purchase_details.product_id',
        'purchase_details.uom_id',
        'purchases.project_id',
        DB::raw('SUM(mpmc_purchase_details.qty) as total_qty'),
        DB::raw('SUM(mpmc_purchase_details.price) as total_price'),
        'purchases.project_id',
        'projects.name as project_name',
    )
    ->whereBetween('purchase_details.created_at', [$startOfMonth, $endOfMonth])
    ->groupBy('purchases.project_id', 'purchase_details.product_id', 'purchase_details.uom_id')
    ->get();

    
    $currentMonth = Carbon::now()->month;
$currentYear = Carbon::now()->year;

$stocks = Stock::with('product.uom')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->get();

                $productReports = $stocks->groupBy('product_id')->map(function ($productStocks) {
                    $purchaseQty = $productStocks->where('transaction_type', 'Purchase')->sum('qty');
                    $requisitionQty = $productStocks->where('transaction_type', 'Requisition')->sum(function ($stock) {
                        return abs($stock->qty);
                    });
                    $product = $productStocks->first()->product;
                    $uom = $productStocks->first()->uom;
                    return [
                        'product_name' => $product->name,
                        'uom_name' => $uom->name,
                        'purchase_qty' => $purchaseQty,
                        'requisition_qty' => $requisitionQty,
                        'current_stock' => $purchaseQty - $requisitionQty,
                        'stock_out' => $requisitionQty
                    ];
                });

                // dd($productReports);
        return view("pages.erp.dashboard",["requisitions"=>$requisitions,"currentMonthName"=>$currentMonthName,'purchasedetails'=>$purchasedetails,'productReports'=>$productReports]);
    }

}
