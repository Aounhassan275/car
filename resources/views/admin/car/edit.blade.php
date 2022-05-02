@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Update {{$car->name}} Car Information | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update {{$car->name}} Car Information</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.car.update',$car->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Car Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Car Name" value="{{@$car->name}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Price</label>
                            <input type="number" name="price" class="form-control" required placeholder="Car Price" value="{{@$car->price}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Make</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option  disabled>Select</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option @if($car->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Model</label>
                            <select name="make_id" id="make_id" class="form-control select2" required>
                                <option >Select</option>
                                <option value="{{@$car->make_id}}" selected>{{@$car->make->name}}</option>
                                
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Car Chasis No.</label>
                            <input type="text" class="form-control" required name="chassis_no"   placeholder="Car Chasis No." value="{{@$car->chassis_no}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Condition</label><br>
                            <input type="radio" name="condition" @if($car->condition == "Used") checked @endif value="Used" > Used 
                            <input type="radio" name="condition" @if($car->condition == "New") checked @endif value="New"> New 
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Manufacture Year</label>
                            <select name="year" class="form-control select2">
                                <option selected disabled>Select Year</option>
                                @for($year = 1980; $year <= Carbon\Carbon::today()->format('Y');$year++)
                                <option @if($car->year == $year) selected @endif  value="{{$year}}">{{$year}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Mileage</label>
                            <input type="text" class="form-control" required name="mileage"  placeholder="Car Mileage" value="{{@$car->mileage}}">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Car Engine</label>
                            <input type="text" class="form-control" required name="engine"  placeholder="E.g 2000 CC" value="{{@$car->engine}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Cylinder</label>
                            <input type="number" class="form-control" required name="cylinder"  placeholder="E.g. 4" value="{{@$car->cylinder}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Exterior Color</label>
                            <input type="text" class="form-control" required name="exterior_color"  placeholder="E.g. Red" value="{{@$car->exterior_color}}">
                        </div>
                        
                        <div class="form-group col-3">
                            <label class="form-label">Interior Color</label>
                            <input type="text" class="form-control" required name="interior_color"  placeholder="E.g. Black" value="{{@$car->interior_color}}">
                        </div>
                        
                   </div>
                   <div class="row">
                    <div class="form-group col-3">
                        <label class="form-label">Car Country</label>
                        <select name="country_id" class="form-control select2" required>
                            <option selected disabled>Select</option>
                            @foreach(App\Models\Country::all() as $country)
                            <option @if($car->country_id == $country->id) selected @endif  value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>     
                    </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Type</label>
                            <select name="type_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\Type::all() as $type)
                                <option @if($car->type_id == $type->id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>     
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Fuel Type</label><br>
                            <input type="radio" name="fuel_type" @if(@$car->fuel_type == "Petrol") checked @endif value="Petrol" > Petrol 
                            <input type="radio" name="fuel_type" @if(@$car->fuel_type == "Desiel") checked @endif value="Desiel"> Desiel  
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Transmission</label><br>
                            <input type="radio" name="transmission" @if(@$car->transmission == "Manual") checked @endif value="Manual" > Manual 
                            <input type="radio" name="transmission" @if(@$car->transmission == "Automatic") checked @endif value="Automatic"> Automatic  
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Car Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2">{{$car->description}}</textarea>
                        </div>
                   </div>
                   <h3>Extra Features</h3>
                   <div class="row">
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->air_conditioning) checked @endif name="air_conditioning"> Air Conditioning</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->power_window) checked @endif name="power_window"> Power Window</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->power_mirror) checked @endif name="power_mirror"> Power Mirror</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->central_locking) checked @endif name="central_locking"> Central Locking</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->airbag) checked @endif name="airbag"> Air Bag</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->anti_theft_system) checked @endif name="anti_theft_system"> Anti Theft System</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->power_steering) checked @endif name="power_steering"> Power Steering</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->anti_brake_system) checked @endif name="anti_brake_system"> Anti Brake System</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" @if($car->tv) checked @endif name="tv"> TV</label>
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Car Images</h5>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a data-toggle="modal" data-target="#add_image_model" href="#" class="btn btn-success">Add New Image</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Car Image</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($car->images as $key => $image)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset($image->image)}}" height="100" width="100" alt=""></td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.car_image.destroy',$image->id)}}" method="POST">
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

<div id="add_image_model" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.car_image.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Car Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Car Image</label>
                        <input class="form-control" type="hidden"  name="car_id" value="{{$car->id}}">
                        <input class="form-control" type="file" name="image">
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
</script>
<script>
    $(document).ready(function(){
        let id;
        $('#category_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('admin.car.models')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#make_id').empty();
                    $('#make_id').append('<option disabled>Select Car Models</option>');
                    for (i=0;i<result.length;i++){
                        $('#make_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    
    });
</script>
@endsection