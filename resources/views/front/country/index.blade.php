@extends('front.layout.index')
@section('title')
<title>CAR COUNTRIES | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Car Countries</h1>
            </header>
        </div>
    </section>
    <section id="one">
        <div class="inner">
            
            <div class="row">
                @foreach(App\Models\Country::all() as $country)
                <div class="col-md-3 col-sm-6 co-xs-12 text-center">


                    <a href="{{route('country.show',str_replace(' ', '_',$country->name))}}">
                        <h3>{{$country->name}}</h3>

                        <h4><em>({{$country->cars->count()}} Cars)</em></h4>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection
