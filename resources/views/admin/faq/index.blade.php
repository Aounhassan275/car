@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add FAQ'S | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Faq's</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.faq.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Question</label>
                            <textarea name="question" class="form-control"  rows="5"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Answer</label>
                            <textarea name="answer" class="form-control"  rows="5"></textarea>
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
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Faq's</h5>
        </div>
        <div class="table-responsive">
            <table class="table" id="datatables-reponsive">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr No.</th>
                        <th style="width:auto;">Question</th>
                        <th style="width:auto;">Answer</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Faq::all() as $key => $faq)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{!! $faq->question !!}</td>
                        <td>{!! $faq->answer !!}</td>
                        <td class="table-action">
                            <button data-toggle="modal" data-target="#edit_modal" answer="{{$faq->answer}}" 
                                question="{{$faq->question}}" id="{{$faq->id}}" class="edit-btn btn"><i class="align-middle" data-feather="edit-2"></i></button>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.faq.destroy',$faq->id)}}" method="POST">
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
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Question</label>
                        <textarea name="question" id="question" class="form-control"  rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Answer</label>
                        <textarea name="answer"  class="form-control"  id="answer"rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            let question = $(this).attr('question');
            let answer = $(this).attr('answer');
            $('#question').val(question);
            $('#answer').val(answer);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.faq.update','')}}' +'/'+id);
        });
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