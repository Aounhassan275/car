@extends('front.layout.index')
@section('title')
<title>CLIENT TESTIMONIALS | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>CLIENT TESTIMONIALS</h1>
            </header>
        </div>
    </section>
    <section>
        <div class="inner">
            <header class="major">
                <h2>Testimonials</h2>
            </header>
            <div class="row">
                @foreach(App\Models\Review::all()->take(4) as $review)
                <div class="col-6">
                    <p><em>"{!! @$review->description !!}"</em></p>
                    <p><strong>- {{@$review->name}}</strong></p>
                    
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection
