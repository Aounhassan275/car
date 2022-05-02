@extends('front.layout.index')
@section('title')
<title>CAR TYPES | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Car Types</h1>
            </header>
        </div>
    </section>
    <section id="one">
        <div class="inner">
            
            <div class="row">
                @foreach(App\Models\Type::all() as $type)
                <div class="col-md-3 col-sm-6 co-xs-12 text-center">


                    <a href="{{route('type.show',str_replace(' ', '_',$type->name))}}">
                        <h3>{{$type->name}}</h3>

                        <h4><em>({{$type->cars->count()}} Cars)</em></h4>
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
