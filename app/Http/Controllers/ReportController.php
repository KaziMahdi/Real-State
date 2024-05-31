<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetail;
use App\Models\RequisitionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reportRequisition(){

        $results = RequisitionDetail::select('project_id', 'product_id','uom_id', DB::raw('SUM(qty) as total_qty'))
        ->groupBy('project_id', 'product_id','uom_id')
        ->paginate(20);
        return view('pages.erp.report.requisition',compact('results'));
    }

    public function reportPurchase(){
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
        ->groupBy('purchases.project_id', 'purchase_details.product_id', 'purchase_details.uom_id')
        ->get();
       
        return view('pages.erp.report.purchase',compact('purchasedetails'));
    }
}
