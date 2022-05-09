@extends('front.layout.index')
@section('title')
<title>CARS | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Cars</h1>
            </header>
        </div>
    </section>

    <section>
        <div class="inner">
            <form method="GET" >
                <div class="fields">
                    <div class="field quarter">
                        <label>Used/New:</label>
                            
                        <select name="condition">
                            <option selected disabled>All</option>
                            <option @if(request()->condition == "New") selected @endif value="New">New Vehicle</option>
                            <option @if(request()->condition == "Used") selected @endif value="Used">Used Vehicle</option>
                        </select>
                    </div>
                    
                    <div class="field quarter">
                        <label>Vehicle Type:</label>
                        <select name="type_id">
                            <option selected disabled>--All --</option>
                            @foreach(App\Models\Type::all() as $type)
                            <option @if(request()->type_id == $type->id) selected @endif  value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="field quarter">
                        <label>Make:</label>
                            
                        <select name="category_id" id="category_id">
                            <option selected disabled>-- All --</option>
                            @foreach(App\Models\Category::all() as $category)
                            <option @if(request()->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field quarter">
                        <label>Model:</label>
                            
                        <select name="make_id" id="make_id">
                            <option selected disabled>-- All --</option>
                            @if(request()->make_id)
                            {!! $model_html !!}
                            @endif
                        </select>
                    </div>

                    <div class="field half text-right">
                        <ul class="actions">
                            <li><input type="submit" value="Search" class="primary"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="tiles">
        @foreach($cars as $car)
        <article>
            <span class="image">
                <img src="{{asset(@$car->images->first()->image)}}" alt="" />
            </span>

            <header class="major" @if($car->sold_out)style="color:red;"@endif>
                <p>
                    <i class="fa fa-dashboard"></i> {{$car->mileage}} &nbsp;&nbsp;
                    <i class="fa fa-cube"></i> {{$car->engine}}&nbsp;&nbsp;
                    <i class="fa fa-cog"></i> {{@$car->transmission}}
                </p>

                <h3 >{{$car->name}}</h3>

                <p> <strong> ¥{{$car->price}}</strong></p>

                <p>{{$car->chassis_no}}  /  {{$car->fuel_type}}  /  {{$car->year}}  /  {{$car->condition}} vehicle</p>

                

                <div class="major-actions">
                    <a href="{{route('cars.show',str_replace(' ', '_',$car->name))}}"@if($car->sold_out)style="color:red;"  class="button"@else class="button small next"@endif>
                        {{$car->sold_out?"Sold Out":'View Car'}}
                    </a>
                </div>
            </header>
        </article>
        @endforeach
        {!! $cars->links() !!}
    </section>


</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        let id;
        $('#category_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('car.models')}}",
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
