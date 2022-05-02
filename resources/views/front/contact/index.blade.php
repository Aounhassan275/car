@extends('front.layout.index')
@section('title')
<title>CONTACT US | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Contact Us</h1>
            </header>
        </div>
    </section>
    <section id="contact">
        <div class="inner">
            <section>
                <header class="major">
                    <h2>Contact us</h2>
                </header>

                <form method="post" action="{{route('contact.store')}}">
                    @csrf
                    <div class="fields">
                        <div class="field half">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" required />
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"  required/>
                        </div>
                        <div class="field">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" required />
                        </div>
                        <div class="field">
                            <label for="message">Notes</label>
                            <textarea name="message" id="message" required rows="6"></textarea>
                        </div>

                        <div class="field half text-right">
                            <ul class="actions">
                                <li><input type="submit" value="Send Message" class="primary" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
            <section class="split">
                @php 
				$mail_setting = App\Models\Setting::first();
				@endphp
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-envelope"></span>
                        <h3>Email</h3>
                        <a href="mailto:{{@$mail_setting->email}}">{{@$mail_setting->email}}</a>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-phone"></span>
                        <h3>Phone</h3>
                        <a href="tel:{{@$mail_setting->phone}}">
                            <span>{{@$mail_setting->phone}}</span>
                        </a>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-home"></span>
                        <h3>Address</h3>
                        <span>{{@$mail_setting->address}}</span>
                    </div>
                </section>
            </section>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection
