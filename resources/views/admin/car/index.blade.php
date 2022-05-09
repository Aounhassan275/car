@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW CAR | CARS</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Car Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Car Name</th>
                        <th style="width:auto;">Car Price</th>
                        <th style="width:auto;">Car Make</th>
                        <th style="width:auto;">Car Model</th>
                        <th style="width:auto;">Car Status</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Car::all() as $key => $car)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$car->name}}</td>
                        <td>¥{{$car->price}}</td>
                        <td>{{$car->category->name}}</td>
                        <td>{{$car->make->name}}</td>
                        <td>
                            @if($car->sold_out)
                            <span class="badge badge-success">Sold Out</span>
                            @else 
                            <span class="badge badge-warning">Active</span>
                            @endif
                        </td>
                        <td class="table-action">
                            @if($car->sold_out)
                            <a href="{{route('admin.car.active',$car->id)}}" style="color:white;" class="btn btn-warning">Make Active</a>
                            @else
                            <a href="{{route('admin.car.sold_out',$car->id)}}" style="color:white;" class="btn btn-primary">Sold Out</a>
                            @endif
                        </td>
                        <td class="table-action">
                            <a href="{{route('admin.car.edit',$car->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.car.destroy',$car->id)}}" method="POST">
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
@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            // responsive: true,
            // lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection