@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Car Model | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Car Model</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.car_model.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Car Model Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Car Model Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Car Category</label>
                            <select name="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
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
            <h5 class="card-title">View Car Model</h5>
        </div>
        <div class="table-responsive">
            <table class="table" id="datatables-reponsive">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr No.</th>
                        <th style="width:auto;">Car Model Name</th>
                        <th style="width:auto;">Car Model Category</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\CarModel::all() as $key => $carModel)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$carModel->name}}</td>
                        <td>
                            {{@$carModel->category->name}}
                        </td>
                        <td class="table-action">
                            <button data-toggle="modal" data-target="#edit_modal" name="{{$carModel->name}}" 
                                category_id="{{$carModel->category_id}}"   id="{{$carModel->id}}" class="edit-btn btn"><i class="align-middle" data-feather="edit-2"></i></button>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.car_model.destroy',$carModel->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Car Model</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Car Model Name</label>
                        <input class="form-control" type="text" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="title">Car Model Category</label>
                        <select name="category_id" id="category_id" class="form-control select2" required>
                            <option selected disabled>Select</option>
                            @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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
     $(function() {
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select Category",
                    dropdownParent: $(this).parent()
                });
        })
    });
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            let name = $(this).attr('name');
            let category_id = $(this).attr('category_id');
            $('#name').val(name);
            $('#id').val(id);
            $('#category_id').val(category_id);
            $('#updateForm').attr('action','{{route('admin.car_model.update','')}}' +'/'+id);
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