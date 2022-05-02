@extends('front.layout.index')
@section('title')
<title>ABOUT US | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>ABOUT US</h1>
            </header>
        </div>
    </section>
    @php 
    $setting = App\Models\Setting::first();
    @endphp
      <section>
        <div class="inner">
            <header class="major">
                <h2>{{$setting->about_us_title}}</h2>
            </header>
            <p>{!! @$setting->about_us !!}</p>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection
