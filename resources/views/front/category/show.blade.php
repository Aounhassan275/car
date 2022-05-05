@extends('front.layout.index')
@section('title')
<title>{{@$category->name}} CARS | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>{{@$category->name}} Cars</h1>
            </header>
        </div>
    </section>
    <section class="tiles">
        @foreach($cars as $car)
        <article>
            <span class="image">
                <img src="{{asset(@$car->images->first()->image)}}" alt="" />
            </span>

            <header class="major">
                <p>
                    <i class="fa fa-dashboard"></i> {{$car->mileage}} &nbsp;&nbsp;
                    <i class="fa fa-cube"></i> {{$car->engine}}&nbsp;&nbsp;
                    <i class="fa fa-cog"></i> {{@$car->transmission}}
                </p>

                <h3>{{$car->name}}</h3>

                <p> <strong> ¥{{$car->price}}</strong></p>

                <p>{{$car->chassis_no}}  /  {{$car->fuel_type}}  /  {{$car->year}}  /  {{$car->condition}} vehicle</p>

                

                <div class="major-actions">
                    <a href="{{route('cars.show',str_replace(' ', '_',$car->name))}}" class="button small next">View Car</a>
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
