@extends('layout.erp.app')
@section('title', 'Requisition')
@section('style')


@endsection

@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                </ul>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead class="border-bottom">
                    <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Uom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchasedetails as $key=>$purchasedetail)

                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $purchasedetail->project_name }}</td>
                            <td>{{ $purchasedetail->product->name }}</td>
                            <td>{{ $purchasedetail->total_price }}</td>
                            <td>{{ $purchasedetail->total_qty }}</td>
                            <td>{{ $purchasedetail->uom->name }}</td>


                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <nav>
                    <ul class="pagination mb-0 d-flex justify-content-between align-items-center">
                        <ul class="pagination mb-0">
                            
                        </ul>
                        <ul class="pagination mb-0">
                                            <span style="font-weight: bold" class="text-end">Total:
                                                </span>
                        </ul>
    
                    </ul>
                </nav>
            </div>
        </div>
    </main>
   
@endsection
@section('script')
    <script>
        function search() {
            let serch = document.getElementById('serch').value
            console.log(serch)
            let table = document.getElementById('table')
            console.log(serch)
            let tr = table.getElementsByTagName('tr')

            for (i = 0; i < tr.length; i++) {

                let td = tr[i].getElementsByTagName('td')

                for (l = 0; l < td.length; l++) {
                    let content = td[l].textContent

                    if (content.indexOf(serch) > -1) {
                        tr[i].style.display = ""
                        tr[i].style.backgroundColor = "#f2f2f2"


                        break;
                    } else {
                        tr[i].style.display = "none"
                    }
                }
            }
        }
    </script>
@endsection
