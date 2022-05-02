@extends('front.layout.index')
@section('title')
<title>BLOGS | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Blogs</h1>
            </header>
        </div>
    </section>
    <section class="tiles">
        @foreach(App\Models\Blog::all() as $blog)
        <article>
            <span class="image">
                <img src="{{asset($blog->image)}}" alt="" />
            </span>
            <header class="major">
                <h3>{{$blog->title}}</h3>

                <p><br> <span>{{$blog->category->name}}</span> | <span>{{$blog->created_at->format('d M,Y')}} </span> | <span>{{{$blog->view}}}</span></p>

                <div class="major-actions">
                    <a href="{{route('blog.show',str_replace(' ', '_',$blog->title))}}" class="button small next scrolly">Read Blog</a>
                </div>
            </header>
        </article>
        @endforeach
    </section>
</div>
@endsection
@section('scripts')

@endsection
