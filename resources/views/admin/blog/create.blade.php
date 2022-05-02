@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add New Blog | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add New Blog</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Blog Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Blog Title">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Blog Category</label>
                            <select name="blog_category_id"  class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\BlogCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                            <textarea name="description" class="form-control" required data-provide="markdown" rows="10"></textarea>
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            // responsive: true
        });
    });
</script>
@endsection