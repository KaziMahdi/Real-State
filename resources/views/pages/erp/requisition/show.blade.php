@extends('layout.erp.app')
@section('style')
<style>
    body {

        color: #484b51;
    }

    .text-secondary-d1 {
        color: #728299 !important;
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
        border-color: #dce9f0 !important;
    }

    .ml-n1,
    .mx-n1 {
        margin-left: .25rem !important;
    }

    .mr-n1,
    .mx-n1 {
        margin-right: -.25rem !important;
    }

    .mb-4,
    .my-4 {
        margin-bottom: 1.5rem !important;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .text-grey-m2 {
        color: #888a8d !important;
    }

    .text-success-m2 {
        color: #86bd68 !important;
    }

    .font-bolder,
    .text-600 {
        font-weight: 600 !important;
    }

    .text-110 {
        font-size: 110% !important;
    }

    .text-blue {
        color: #478fcc !important;
    }

    .pb-25,
    .py-25 {
        padding-bottom: .75rem !important;
    }

    .pt-25,
    .py-25 {
        padding-top: .75rem !important;
    }

    .bgc-default-tp1 {
        background-color: #9370DB !important;
    }

    .bgc-default-l4,
    .bgc-h-default-l4:hover {
        background-color: #f3f8fa !important;
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
        font-size: 120% !important;
    }

    .text-primary-m1 {
        color: #4087d4 !important;
    }

    .text-danger-m1 {
        color: #dd4949 !important;
    }

    .text-blue-m2 {
        color: #68a3d5 !important;
    }

    .text-150 {
        font-size: 150% !important;
    }

    .text-60 {
        font-size: 60% !important;
    }

    .text-grey-m1 {
        color: #7b7d81 !important;
    }

    .align-bottom {
        vertical-align: bottom !important;
    }
    #pur{
        background-color:#348CD4;
        
        -webkit-transition: background-color 2s ease-out;
  -moz-transition: background-color 2s ease-out;
  -o-transition: background-color 2s ease-out;
  transition: background-color 2s ease-out;
}

#pur:hover {
  background-color: green;
  cursor: pointer;
}
    
</style>
@endsection


@section('page')


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2" >
        <h1 class="page-title text-secondary-d1">
            
            <small class="page-info" style="font-size: large;">
                
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <span class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print" onclick="printInvoice()">
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
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                
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
                    <!-- /.col -->
                <!-- .row -->
                <div class="row mt-5" style="font-size:medium">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Requestor:</span>
                            <span class="text-600 text-110 text-blue align-middle">
                                @if($user)
                                {{$user->name}}
                                @else
                                User Not Found
                            @endif
                        </span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                Address: {{$user ? $user->address : 'N/A'}}
                            </div>
                            
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary">
                                </i> <b class="text-600">{{$user ? $user->phone : 'N/A'}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                <h5>Product Requisition</h5>
                            </div>

                            <div class="my-2"><i class="fa fa-circle  text-xs mr-1" style="color:#348CD4"></i> <span class="text-600 text-90">ID:</span> {{$requisition->id}}</div>

                            <div class="my-2"><i class="fa fa-circle  text-xs mr-1" style="color:#348CD4"></i> <span class="text-600 text-90">Date:</span> {{ \Carbon\Carbon::parse($requisition->requisition_date)->format('Y-m-d') }}
                            </div>

                            <div class="my-2"><i class="fa fa-circle  text-xs mr-1" style="color:#348CD4"></i> <span class="text-600 text-90">Status:</span>{{$requisition->status}}</div>
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
                            <th class="opacity-2">ID</th>
                            <th>Project</th>
                            <th class="text-center">Task</th>
                            <th>Req: Product</th>
                            <th>Req: Qty</th>
                            <th>Approve Qty</th>
                            <th width="140"> UoM</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3 mt-3">
                            @php
                            $sn=0
                            @endphp
                        @foreach($detailrequs as $detailrequ)
                        <tr>
                            <td>{{++$sn}}</td>
                            <td>{{$detailrequ->pname}}</td>
                            <td>{{$detailrequ->tname}}</td>
                            <td>{{$detailrequ->mname}}</td>
                            <td>{{$detailrequ->qty}}</td>
                            <td>{{$detailrequ->approve_qty}}</td>
                            <td>{{$detailrequ->uname}}</td>
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
                            <div class="row my-2 ">
                                
                            </div>
                        </div>
                    </div>
                   
                    <div style="padding-bottom: 100px;display:flex;justify-content:space-between">
                    
                    
                    </div>
                    <div class="mb-5">
                        <hr style="width: 30%">
                        <span class="text-secondary-d1 text-105">Approve By</span>
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