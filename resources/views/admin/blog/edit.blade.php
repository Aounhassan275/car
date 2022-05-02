@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Update {{$blog->title}} Blog Information | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update {{$blog->title}} Blog Information</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf 
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Blog Title</label>
                            <input type="text" name="title" value="{{@$blog->title}}" class="form-control" placeholder="Blog Title">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Blog Category</label>
                            <select name="blog_category_id"  class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\BlogCategory::all() as $category)
                                <option @if($blog->blog_category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Blog Image</label>
                            <input type="file" name="image" class="form-control"  required>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Blog Description</label>
                            <textarea name="description" class="form-control" required data-provide="markdown" rows="10">{!! $blog->description !!}</textarea>
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
     $(function() {
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select Blog Category",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>
@endsection