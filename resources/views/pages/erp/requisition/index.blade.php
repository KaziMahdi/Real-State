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
            <div>
                <a href="{{ route('requisitions.create') }}" class="btn btn-info">Create Requisitions</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead class="border-bottom">
                    <tr>
                        <th>Id</th>

                        <th>Uers</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisitions as $requisition)

                        <tr>
                            <td>{{ $requisition->id }}</td>
                            <td>{{ $requisition->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($requisition->requisition_date)->format('Y-m-d') }}</td>
                            <td>{{ $requisition->status }}</td>
                            <td>{{ $requisition->remark }}</td>


                            <td>
                                <form action="{{ route('requisitions.destroy', $requisition->id) }}" method="post">
                                    <div class="btn-group" role="group">
{{--                                        <a class= 'btn btn-primary'--}}
{{--                                            href="{{ route('requisitions.edit', $requisition->id) }}"--}}
{{--                                            title="Edit">Edit</a>--}}
                                        <span data-bs-toggle="modal"
                                              data-bs-target="#edit-{{ $requisition->id }}"
                                              class="btn btn-primary">Edit</span>
                                        <a class= 'btn btn-success'
                                            href="{{ route('requisitions.show', $requisition->id) }}"
                                            title="Details">Show</a>
                                        <a>
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" name="delete" title="Delete" class="btn btn-danger">
                                                Delete</button>
                                        </a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <nav>
                    <ul class="pagination mb-0 d-flex justify-content-between align-items-center">
                        <ul class="pagination mb-0">
                            {{ $requisitions->withQueryString()->links() }}
                        </ul>
                        <ul class="pagination mb-0">
                                            <span style="font-weight: bold" class="text-end">Total:
                                                {{ $requisitions->total() }}</span>
                        </ul>
    
                    </ul>
                </nav>
            </div>
        </div>
    </main>
    @foreach($requisitions as $requisition)

        <div class="modal fade" id="edit-{{ $requisition->id }}" tabindex="-1"
             role="dialog" aria-labelledby="formModal" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Edit Requisition</h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ Form::open(['route' => ['requisitions.update', $requisition->id], 'method' => 'PUT', 'files' => true]) }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    {{ Form::label('user_id', 'Requester Name', ['class' => 'required']) }}
                                    <div class="input-group">
                                        {{ Form::select('user_id',$users->pluck('name','id'),$requisition->user_id, ['class' => 'form-select']) }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{ Form::label('requisition_date', 'Request Date', ['class' => 'required']) }}
                                    <div class="input-group">
                                        {{ Form::date('requisition_date', \Carbon\Carbon::parse($requisition->requisition_date)->format('Y-m-d')
                                        , ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="row">
                                <div class="col-4">
                                    {{ Form::label('status', 'Status', ['class' => 'required']) }}
                                    <div class="input-group">
                                        {{ Form::select('status',['Pending'=>'Pending','Processing'=>'Processing','Running'=>'Running','Complete'],$requisition->status, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-4">
                                    {{ Form::label('remark', 'Remark', ['class' => 'required']) }}
                                    <div class="input-group">
                                        {{ Form::text('remark',$requisition->remark, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-4">
                                    {{ Form::label('needed_date', 'Needed Date', ['class' => 'required']) }}
                                    <div class="input-group">
                                        {{ Form::date('needed_date',\Carbon\Carbon::parse($requisition->needed_date)->format('Y-m-d'), ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <b>Edit Requisition Item</b>
                        <hr class="mt-2 mb-2" style="width: 30%">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tbody>
                                        <tr>
                                            <th data-width="40" style="width: 40px;">#</th>
                                            <th>Project</th>
                                            <th>Task</th>
                                            <th>Product</th>
                                            <th>Request Qty</th>
                                            <th class="text-center">Request Unit</th>
                                            <th class="text-center">Approve Qty</th>
                                            <th class="text-center">Approve Unit</th>
                                        </tr>
                                        @php
                                            $sn=0;
                                            $items=[];
                                        @endphp
                                        @foreach($requisition->requisitionItems as $requisitionItem)
                                            <tr>
                                                <td>{{++$sn}}</td>
                                                <td>{{Form::select('items['.$loop->index.'][project_id]',$projects->pluck('name','id'),$requisitionItem->project_id ?? null,['class'=>'form-select'])}}</td>
                                                <td>{{Form::select('items['.$loop->index.'][task_id]',$tasks->pluck('name','id'),$requisitionItem->task_id ?? null,['class'=>'form-select'])}}</td>
                                                <td>{{Form::select('items['.$loop->index.'][product_id]',$products->pluck('name','id'),$requisitionItem->product_id ?? null,['class'=>'form-select'])}}</td>
                                                <td class="text-center">{{Form::text('items['.$loop->index.'][qty]',$requisitionItem->qty ?? null,['class'=>'form-control'])}}</td>
                                                <td class="text-center">{{Form::select('items['.$loop->index.'][uom_id]',$units->pluck('name','id'),$requisitionItem->uom_id ?? null,['class'=>'form-select'])}}</td>
                                                <td class="text-center">{{Form::text('items['.$loop->index.'][approve_qty]',$requisitionItem->approve_qty ?? null,['class'=>'form-control'])}}</td>
                                                <td class="text-center">{{Form::select('items['.$loop->index.'][approve_uom_id]',$units->pluck('name','id'),$requisitionItem->approve_uom_id ?? null,['class'=>'form-select','placeholder'=>'--Select One--'])}}</td>
                                            
                                            </tr>
                                            @php
                                                $items[]=[
                                                    'project_id'=> $requisitionItem->project_id ?? null,
                                                    'task_id'=> $requisitionItem->task_id ?? null,
                                                    'product_id'=> $requisitionItem->product_id ?? null,
                                                    'qty'=>$requisitionItem->qty ?? null,
                                                    'uom_id'=>$requisitionItem->uom_id ?? null,
                                                     'approve_qty'=>$requisitionItem->approve_qty ?? null,
                                                    'approve_uom_id'=>$requisitionItem->approve_uom_id ?? null
                                                    ];
                                            @endphp
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center">
                            {{ Form::button('Close', ['class' => 'btn btn-danger m-t-15 weaves-effect', 'data-bs-dismiss' => 'modal']) }}
                            {{ Form::submit('Update', ['class' => 'btn btn-primary m-t-15 weaves-effect']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
