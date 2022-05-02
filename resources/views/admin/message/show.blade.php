@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>View {{$message->name}} Message | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View {{$message->name}} Message Detail</h5>
                <a href="mailto:{{$message->email}}">
                    <span class="badge badge-success">{{$message->email}}</span>
                </a>
                <div class="row">
                    <div class="col-12 text-right">
                        <form action="{{route('admin.messages.destroy',$message->id)}}" method="POST">
                            @method('DELETE')
                            @csrf   
                            <button type="submit" class="btn btn-danger text-right">Delete Message</button>                
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2>{{$message->subject}}</h2>
                <p>{!! $message->message !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@endsection