@extends('front.layout.index')
@section('title')
<title>SALES TERMS | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>SALES TERMS</h1>
            </header>
        </div>
    </section>
    @php 
    $setting = App\Models\Setting::first();
    @endphp
    <section>
        <div class="inner">
            <header class="major">
                <h2>{{$setting->sales_terms_title}}</h2>
            </header>
            <p>{!! @$setting->sales_terms !!}</p>
        </div>
    </section>
  
</div>
@endsection
@section('scripts')

@endsection
