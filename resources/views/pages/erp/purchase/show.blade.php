@extends('layout.erp.app')
@section('style')
<style>
body{
    
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: .25rem !important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color:#9370DB!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

</style>
@endsection


@section('page')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Purchase Invoice
            <small class="page-info" style="font-size: large;">
                <i class="fa fa-angle-double-right text-40"></i>
                ID: #{{$purchase->id}}
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <span class="btn bg-white btn-light mx-1px text-95" onclick="printInvoice()">

                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                    
                </span>
                <a class="btn bg-white btn-light mx-1px text-95" id="generatePDF" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0" id="purchase-document">
        <div class="row mt-4" style="" >
            <div class="col-12 col-lg-12 mt-3">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="text-center">
                            <img src="{{asset('assets/logo/logo.jpeg')}}">
                        </div>
                    </div>
                    <div class="col-6 mt-5">
                        <div class="text-right">
                            <span class="text-default-d3 text-150" style="font-weight: bold">Randal Shipping Inc.</span><br>
                            <span class="text-default-d3" style="font-size: 10pt" >Harbo Drive 789,<br>Port City,USA 89012</span><br>
                            <span class="text-default-d3" style="font-size: 10pt">222 555 7777 | <br>www.raditional.com</span>
                        </div>
                    </div>
                </div>
                <div style="border-bottom: 2px solid black;margin-top:10px"></div>
                <div class="row mt-5" style="font-size:medium">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle"><b>Supplier Name:</b></span><br>
                            <span class="text-600 text-110 text-blue align-middle">{{$supplier->name}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                           <b> Shipping Address:</b> {{$purchase->shipping_address}}
                            </div>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                           <b> Project Name:</b> {{$purchase->project->name}}
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="my-2"><i class="fa fa-circle  text-xs mr-1" style="color:#348CD4"></i> <span class="text-600 text-90">Invoice ID:</span> {{$purchase->id}}</div>

                            <div class="my-2"><i class="fa fa-circle  text-xs mr-1" style="color:#348CD4"></i> <span class="text-600 text-90">Purchase Date:</span> {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d F Y') }}</div>

                            <div class="my-2"><i class="fa fa-circle  text-xs mr-1" style="color:#348CD4"></i> <span class="text-600 text-90">Delivery Date:</span> {{ \Carbon\Carbon::parse($purchase->delivery_date)->format('d F Y') }}</div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    
            <div class="table-responsive mt-5">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1" style="border-top: 2px solid black;border-bottom:2px solid black">
                        
                        <tr class="text-white">
                            <th class="opacity-2">SL</th>
                            <th>Products</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th width="140">Uom</th>
                        </tr>
                        
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        @php
                        $sn=0;
                        $subtotal=0;
                        @endphp
                        
                        @foreach($detailspurchases as $detailspurchase)
                        <tr>
                            <td>{{++$sn}}</td>
                            <td>{{$detailspurchase->mname}}</td>
                            <td>{{$detailspurchase->qty}}</td>
                            <td class="text-95">{{$detailspurchase->price}}</td>
                            <td class="text-secondary-d2">{{$detailspurchase->uname}}</td>

                            <?php 
                            $amount=$detailspurchase->price*$detailspurchase->qty-$detailspurchase->discount;
                            $subtotal+=$amount;
                            ?>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                           
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last" style="font-size:medium">
                            <div class="row my-2">
                                
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                   <b> Subtotal:</b>
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">{{$subtotal}}</span>
                                </div>
                                <hr style="background-color: black;width:80%">
                                <div class="col-7 text-right">
                                    <b> Tax (5%):</b>
                                </div>
                                <?php $tax=$subtotal*0.05?>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">{{$tax}}</span>
                                </div>
                                <hr style="background-color: black;width:80%">
                                <?php $total=$subtotal+$tax?>
                                <div class="col-7 text-right">
                                    <b> Total:</b>
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">{{$total}}</span>
                                </div>
                                <hr style="background-color: black;width:80%">
                                <div class="col-7 text-right">
                                    <b> Paid Amount:</b>
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">{{$purchase->paid_amount}}</span>
                                </div>
                                <hr style="background-color: black;width:80%">
                                <?php $due= $total-$purchase->paid_amount?>
                                <div class="col-7 text-right">
                                    <b>  Due Amount:</b>
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">{{$due}}</span>
                                </div>
                            </div>

                            <div class="row my-2 ">
                                
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5"/>
                    <div style="text-align:center;" >
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function printInvoice() {
            var printContents = document.getElementById('purchase-document').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
