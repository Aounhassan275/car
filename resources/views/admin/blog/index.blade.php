@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>View Blog | CARS</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Blogs</h5>
        </div>
        <div class="table-responsive">
            <table class="table" id="datatables-reponsive">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr No.</th>
                        <th style="width:auto;">Blog Image</th>
                        <th style="width:auto;">Blog Title</th>
                        <th style="width:auto;">Blog Category Name</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Blog::all() as $key => $blog)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset($blog->image)}}" width="100" height="100"></td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->category->name}}</td>
                        <td class="table-action">
                            <a href="{{route('admin.blog.edit',$blog->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.blog.destroy',$blog->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            // responsive: true
        });
    });
</script>
@endsection