@extends('front.layout.index')
@section('title')
<title>BLOG CATEGORIES | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Blog Categories</h1>
            </header>
        </div>
    </section>
    <section id="one">
        <div class="inner">
            
            <div class="row">
                @foreach(App\Models\BlogCategory::all() as $category)
                <div class="col-md-3 col-sm-6 co-xs-12 text-center">


                    <a href="{{route('blog_category.show',str_replace(' ', '_',$category->name))}}">
                        <h3>{{$category->name}}</h3>

                        <h4><em>({{@$category->blogs->count()}} Blogs)</em></h4>
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
