@extends('layout.erp.app')


@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Users</a></li>
                    <li><a class="btn btn-light" href="{{ route('purchases.index') }}">Manage Purchases</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('purchases.create') }}" class="btn btn-info">Create Purchases</a>
            </div>
        </div>
        <table class="table table-striped" id="table">
            <thead class="border-bottom">
                <tr>
                    <th>Id</th>
                    {{-- <th>Warehouse</th> --}}
                    <th>Supplier</th>
                    <th>Purchase Date</th>
                    <th>Delivery Date</th>
                    <th>Purchase Total</th>
<th>Due Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        {{-- <td>{{$purchase->warehouse}}</td> --}}
                        <td>{{ $purchase->supplier }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                        <td>{{ $purchase->delivery_date }}</td>
                        <td>{{ $purchase->purchase_total }}</td>
                        
                        <?php 
                        $due_amount=$purchase->purchase_total-$purchase->paid_amount ;
                        
                        ?>
                        <td>{{$due_amount}}</td>


                        <td>
                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="post">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('purchases.edit', $purchase->id) }}" title="Edit"
                                        class="btn btn-primary ">Edit</a><a>
                                    </a><a href="{{ route('purchases.show', $purchase->id) }}" title="Details"
                                        class="btn btn-info">Show</a><a>
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" name="delete" title="Delete" class="btn btn-danger">
                                            Delete</button>

                            </form>
                            </a>
                            </div><a>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer">
            <nav>
                <ul class="pagination mb-0 d-flex justify-content-between align-items-center">
                    <ul class="pagination mb-0">
                        {{ $purchases->withQueryString()->links() }}
                    </ul>
                    <ul class="pagination mb-0">
                                        <span style="font-weight: bold" class="text-end">Total:
                                            {{ $purchases->total() }}</span>
                    </ul>

                </ul>
            </nav>
        </div>
    </main>
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

@endsection
