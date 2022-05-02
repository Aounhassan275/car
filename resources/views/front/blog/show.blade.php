@extends('front.layout.index')
@section('title')
<title>{{$blog->title}} BLOGS | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>{{$blog->title}}</h1>

                <h4><i class="fa fa-user"></i>{{$blog->category->name}}  &nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-calendar"></i> {{$blog->created_at->format('d M,Y')}}   &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-eye"></i> {{$blog->view}}</h4>
            </header>
            <span class="image main"><img src="{{asset($blog->image)}}" height="400px" alt="" /></span>
            <p>{!! $blog->description !!}</p>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection
