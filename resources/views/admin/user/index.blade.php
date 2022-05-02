@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW USER | CASH WE CAN</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View User Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width:auto;">#</th>
                        <th style="width:auto;">Name</th>
                        <th style="width:auto;">Email </th>
                        <th style="width:auto;">Country </th>
                        <th style="width:auto;">City </th>
                        <th style="width:auto;">Postal Code </th>
                        <th style="width:auto;">Address </th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\User::all() as $key => $user)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->postal_code}}</td>
                        <td>{{$user->address}}</td>
                        <td> <a href="{{route('admin.user.detail',$user->id)}}" class="button"><button class="btn btn-primary"> Detail</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            responsive: true,
            lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection