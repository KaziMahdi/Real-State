<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Add this CSS to your existing stylesheet or create a new one */

        /* Main dashboard container */
        .total-purchases {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .purchase-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .purchase-details th,
        .purchase-details td {
            border: 2px solid #ccc;
            padding: 4px;
            text-align: center;
        }

        .purchase-details th {
            background-color: #ffc107;
        }

        main {
            padding: 20px;
        }

        /* Section styling */
        section {

            border-radius: 8px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
            background-color:white
        }

        /* Section headings */
        section h2 {
            margin-top: 0;
            font-size: 1.5rem;
            color: #333333;
            padding: 10px;
            background-color: #f8f9fa;
            border-top-left-radius: 10px;
            border-top-right-radius: 8px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px;
        }

        table th,
        table td {
            border: 2px solid #ccc;
            padding: 5px;

            text-align: center;
        }

        table th {
            background-color: #f8f9fa;
            text-align: right;
            font-weight: bold;
            text-align: center;
        }

        /* Breadcrumb styling */
        .breadcrumbs {
            list-style: none;
            padding: 0;

        }

        .breadcrumbs li {
            display: inline;
        }

        .breadcrumbs li:not(:last-child):after {
            content: '/';
            margin: 0 10px;
            color: #ccc;
        }

        .breadcrumbs li a {
            text-decoration: none;
            color: #007bff;
        }

        .breadcrumbs li a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>




    @extends('layout.erp.app')

    @section('page')
        <?php
        $sessions = session()->all();
        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        ?>

        @if ($user_role_id == 1)
            <main>
                <div class="d-flex flex-row justify-content-between">
            <div>
                <h1 class="title">Dashboard</h1>
                <ul class="breadcrumbs">
                    <li><a href="#">{{$currentMonthName}}</a></li>
                    <li><a href="#" class="active">Dashboard</a></li>
                </ul>
            </div>
            <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Report
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{url('/report/requisition')}}">Requisition</a></li>
                      <li><a class="dropdown-item" href="{{url('/report/purchase')}}">Purchase</a></li>
                      <li><a class="dropdown-item" href="#">Stock</a></li>
                    </ul>
                  </div>
                </div>
            </main>
                   
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <h5 class="text-center border" style="background-color: antiquewhite">Monthly Requisition
                            
                        </h5>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Uom Name</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($requisitions as $key=>$requisition)
                            <tr>
                                <th scope="row">{{$key++}}</th>
                                <td>{{$requisition->project->name}}</td>
                                <td>{{$requisition->product->name}}</td>
                                <td>{{$requisition->total_qty}}</td>
                                <td>{{$requisition->uom->name}}</td>
                            
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <h5 class="text-center border" style="background-color: antiquewhite">Monthly Purchase</h5>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Total Qty</th>
                                <th scope="col">Uom Name</th>
                                <th scope="col">Total Price</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchasedetails as $key=>$purchasedetail)
                              <tr>
                                <th scope="row">{{$key++}}</th>
                                <td>{{$purchasedetail->project_name}}</td>
                                <td>{{$purchasedetail->product->name}}</td>
                                <td>{{$purchasedetail->total_qty}}</td>
                                <td>{{$purchasedetail->uom->name}}</td>
                                <td>{{$purchasedetail->total_price}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-12 col-md-6 col-12">
                    <h5 class="text-center border" style="background-color: antiquewhite">Monthly Stock Report</h5>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Total purchase Qty</th>
                            <th scope="col">Current Stock qty</th>
                            <th scope="col">Stock Out qty</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($productReports as $key=>$productReport)
                        
                        <tr>
                            <th scope="row">{{$key++}}</th>
                            <td>{{ $productReport['product_name'] }} ({{ $productReport['uom_name'] }})</td>
                            <td>{{ $productReport['purchase_qty'] }}</td>
                            <td>{{ $productReport['current_stock'] }}</td>
                            <td>{{ $productReport['stock_out'] }}</td>
                            <td></td>

                          </tr>
                        
                        
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            </div>
            
        @endif

        @if ($user_role_id == 2)
            <h1 style="min-height: 1500px"> User Panel.....Coming Soon</h1>
        @endif
    @endsection

    @section('script')
    @endsection


</body>

</html>
