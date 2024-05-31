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
                    <li><a class="btn btn-light" href="{{ route('requisitions.index') }}">Manage Requisitions</a></li>
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
                        <th>Qty</th>
                        <th>Uom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $key=>$result)

                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $result->project->name }}</td>
                            <td>{{ $result->product->name }}</td>
                            <td>{{ $result->total_qty }}</td>
                            <td>{{ $result->uom->name }}</td>


                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <nav>
                    <ul class="pagination mb-0 d-flex justify-content-between align-items-center">
                        <ul class="pagination mb-0">
                            {{ $results->withQueryString()->links() }}
                        </ul>
                        <ul class="pagination mb-0">
                                            <span style="font-weight: bold" class="text-end">Total:
                                                {{ $results->total() }}</span>
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
