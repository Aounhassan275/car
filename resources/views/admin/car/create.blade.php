@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>ADD CAR | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Car</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.car.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Car Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Car Name">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Price</label>
                            <input type="number" name="price" class="form-control" required placeholder="Car Price">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Make</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Model</label>
                            <select name="make_id" id="make_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Car Chasis No.</label>
                            <input type="text" class="form-control" required name="chassis_no"  placeholder="Car Chasis No." value="">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Condition</label><br>
                            <input type="radio" name="condition" value="Used" > Used 
                            <input type="radio" name="condition" value="New"> New 
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Manufacture Year</label>
                            <select name="year" class="form-control select2">
                                <option selected disabled>Select Year</option>
                                @for($year = 1980; $year <= Carbon\Carbon::today()->format('Y');$year++)
                                <option value="{{$year}}">{{$year}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Mileage</label>
                            <input type="text" class="form-control" required name="mileage"  placeholder="Car Mileage" value="">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Car Engine</label>
                            <input type="text" class="form-control" required name="engine"  placeholder="E.g 2000 CC" value="">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Cylinder</label>
                            <input type="number" class="form-control" required name="cylinder"  placeholder="E.g. 4" value="">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Exterior Color</label>
                            <input type="text" class="form-control" required name="exterior_color"  placeholder="E.g. Red" value="">
                        </div>
                        
                        <div class="form-group col-3">
                            <label class="form-label">Interior Color</label>
                            <input type="text" class="form-control" required name="interior_color"  placeholder="E.g. Black" value="">
                        </div>
                        
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Car Country</label>
                            <select name="country_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\Country::all() as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>     
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Type</label>
                            <select name="type_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\Type::all() as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>     
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Fuel Type</label><br>
                            <input type="radio" name="fuel_type" value="Petrol" > Petrol 
                            <input type="radio" name="fuel_type" value="Desiel"> Desiel  
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Car Transmission</label><br>
                            <input type="radio" name="transmission" value="Manual" > Manual 
                            <input type="radio" name="transmission" value="Automatic"> Automatic  
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Car Images</label>
                            <input type="file" name="images[]" class="form-control"  required>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Car Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2"></textarea>
                        </div>
                   </div>
                   <h3>Extra Features</h3>
                   <div class="row">
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="air_conditioning"> Air Conditioning</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="power_window"> Power Window</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="power_mirror"> Power Mirror</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="central_locking"> Central Locking</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="airbag"> Air Bag</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="anti_theft_system"> Anti Theft System</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="power_steering"> Power Steering</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="anti_brake_system"> Anti Brake System</label>
                        </div>
                        <div class="form-group col-3">
                            <label><input type="checkbox" name="tv"> TV</label>
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