@extends('front.layout.index')
@section('title')
<title>Bank Details | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Bank Details</h1>
            </header>
        </div>
    </section>
    <section>
        <div class="inner">
            <div class="row">
                @foreach(App\Models\Bank::all() as $key => $bank)
                
                <div class="col-6">
                    <header class="major">
                        <h2>Bank Detail - {{$key+1}}</h2>
                    </header>
                    <p><strong>- Payee Name :</strong>{{@$bank->payee_name}}</p>
                    <p><strong>- Bank Name :</strong>{{@$bank->bank_name}}</p>
                    <p><strong>- Account Number :</strong>{{@$bank->account_number}}</p>
                    <p><strong>- Bank Address :</strong>{{@$bank->bank_address}}</p>
                    <p><strong>- Swift Code :</strong>{{@$bank->swift_code}}</p>
                    
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection
