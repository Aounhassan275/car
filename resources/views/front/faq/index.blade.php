@extends('front.layout.index')
@section('title')
<title>FAQ's | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>FAQ's(Frequently Ask Questions)</h1>
            </header>
        </div>
    </section>
    <section id="one">
        <div class="inner">
            <div class="row">
                @foreach(App\Models\Faq::all() as $key => $faq)
                <div class="col-6">
                    <h4><i class="fa fa-question-circle"></i> {!! $faq->question !!}?</h4>
                    <p>{!! $faq->answer !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection
