@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Bank Details | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Bank Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.bank_details.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Payee Name</label>
                            <input type="text" name="payee_name" class="form-control" placeholder="Enter Payee Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" required>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Account Number</label>
                            <input type="text" name="account_number" class="form-control" placeholder="Enter Account Number" required>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Bank Address</label>
                            <input type="text" name="bank_address" class="form-control" placeholder="Enter Bank Address" required>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Swift Code</label>
                            <input type="text" name="swift_code" class="form-control" placeholder="Enter Swift Code" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Bank Details</h5>
        </div>
        <div class="table-responsive">
            <table class="table" id="datatables-reponsive">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr No.</th>
                        <th style="width:auto;">Payee Name</th>
                        <th style="width:auto;">Bank Name</th>
                        <th style="width:auto;">Account #</th>
                        <th style="width:auto;">Bank Address</th>
                        <th style="width:auto;">Swift Code</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Bank::all() as $key => $bank)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$bank->payee_name}}</td>
                        <td>{{$bank->bank_name}}</td>
                        <td>{{$bank->account_number}}</td>
                        <td>{{$bank->bank_address}}</td>
                        <td>{{$bank->swift_code}}</td>
                        <td class="table-action">
                            <button data-toggle="modal" data-target="#edit_modal" payee_name="{{$bank->payee_name}}" 
                                bank_name="{{$bank->bank_name}}"  account_number="{{$bank->account_number}}" bank_address="{{$bank->bank_address}}" 
                                swift_code="{{$bank->swift_code}}"id="{{$bank->id}}" class="edit-btn btn"><i class="align-middle" data-feather="edit-2"></i></button>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.bank_details.destroy',$bank->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Bank Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Payee Name</label>
                        <input type="text" id="payee_name" name="payee_name" class="form-control" placeholder="Enter Payee Name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter Bank Name" required>
                    </div>
                    <div class="form-group ">
                        <label class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter Account Number" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bank Address</label>
                        <input type="text" id="bank_address" name="bank_address" class="form-control" placeholder="Enter Bank Address" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Swift Code</label>
                        <input type="text" id="swift_code" name="swift_code" class="form-control" placeholder="Enter Swift Code" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            let payee_name = $(this).attr('payee_name');
            let bank_name = $(this).attr('bank_name');
            let account_number = $(this).attr('account_number');
            let bank_address = $(this).attr('bank_address');
            let swift_code = $(this).attr('swift_code');
            $('#payee_name').val(payee_name);
            $('#bank_name').val(bank_name);
            $('#account_number').val(account_number);
            $('#bank_address').val(bank_address);
            $('#swift_code').val(swift_code);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.bank_details.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            // responsive: true
        });
    });
</script>
@endsection