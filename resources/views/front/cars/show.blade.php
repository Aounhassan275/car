@extends('front.layout.index')
@section('title')
<title>{{$car->name}} | CAR DEALER</title>
@endsection
@section('contents')
<div id="main" class="alt">

    <!-- One -->
        <section id="one">
            <div class="inner">
                <header class="major">
                    <h1>{{$car->name}} ({{$car->country->name}})</h1>
                </header>

                <div class="row">
                    <div class="col-md-6">
                        <img src="{{$car->images->first()->image}}" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            @foreach($car->images as $image)
                            <div class="col-md-4 col-xs-6"><img src="{{asset($image->image)}}" class="img-responsive" alt=""></div>
                            @endforeach
                        </div>

                        <br>

                        <h2>¥{{$car->price}}</h2>
                    </div>
                </div>

                <br>

                <form action="#">
                    <div class="fields">
                        <div class="field quarter">
                            <label>Type</label>
                             
                            <input type="text" readonly value="{{$car->condition}}">
                        </div>

                        <div class="field quarter">
                            <label>Make</label>
                             
                            <input type="text" readonly value="{{$car->make->name}}">
                        </div>

                        <div class="field quarter">
                            <label>Model</label>
                             
                            <input type="text" readonly value="{{$car->category->name}}">
                        </div>

                        <div class="field quarter">
                            <label>Manufacture Year</label>
                             
                            <input type="text" readonly value="{{$car->year}}">
                        </div>

                        <div class="field quarter">
                            <label>Mileage</label>
                             
                            <input type="text" readonly value="{{$car->mileage}}">
                        </div>

                        <div class="field quarter">
                            <label>Fuel</label>
                             
                            <input type="text" readonly value="{{$car->fuel_type}}">
                        </div>

                        <div class="field quarter">
                            <label>Engine size</label>
                             
                            <input type="text" readonly value="{{$car->engine}}">
                        </div>

                        <div class="field quarter">
                            <label>Chasis No.</label>
                             
                            <input type="text" readonly value="{{$car->chassis_no}}">
                        </div>

                        <div class="field quarter">
                            <label>Gearbox</label>
                             
                            <input type="text" readonly value="{{$car->transmission}}">
                        </div>

                        <div class="field quarter">
                            <label>Type</label>
                             
                            <input type="text" readonly value="{{@$car->type->name}}">
                        </div>

                        <div class="field quarter">
                            <label>Exterior Color</label>
                             
                            <input type="text" readonly value="{{$car->exterior_color}}">
                        </div>

                        <div class="field quarter">
                            <label>Interior Color</label>
                             
                            <input type="text" readonly value="{{$car->interior_color}}">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section id="contact">
            <div class="inner">
                <section>
                    <header class="major">
                        <h2>Vehicle Description</h2>
                    </header>

                    <p>
                        @if($car->air_conditioning)
                        - Chilled Air Conditioner<br>
                        @endif
                        @if($car->power_window)
                        - Power Window<br>
                        @endif
                        @if($car->power_mirror)
                        - Power Mirror<br>
                        @endif
                        @if($car->central_locking)
                        - Central Locking<br>
                        @endif
                        @if($car->airbag)
                        - Airbag front and side airbags<br>
                        @endif
                        @if($car->anti_theft_system)
                        - Anti Theft System<br>
                        @endif
                        @if($car->power_steering)
                        - Power Steering<br>
                        @endif
                        @if($car->anti_brake_system)
                        - Anti Brake System (ABS)<br>
                        @endif
                        @if($car->tv)
                        - HD TV / Roof TV<br>
                        @endif
                        @if($car->trip_speedometer)
                        - Trip Speedometer<br>
                        @endif
                        @if($car->speedometer_light)
                        - Speedo Meter Display Light Adjustment<br>
                        @endif
                        @if($car->front_headlights_button)
                        - Front Headlights Adjustment Option Button<br>
                        @endif
                        @if($car->vehicle_assist)
                        - Vehicle Assist<br>
                        @endif
                        @if($car->eco_mode_engine)
                        - ECO Mode Engine<br>
                        @endif
                        @if($car->hd_navigation)
                        - HD Navigation<br>
                        @endif
                        @if($car->handle_right)
                        - Handle Right Handle<br>
                        @endif
                        @if($car->aux)
                        - Aux / Bluetooth / Wifi / FM,AM / Disc / MSV / IPOD Connectivity / USB / HDMI / Walkman<br>
                        @endif
                        @if($car->alloy_wheels)
                        - Beautiful Alloy Wheels<br>
                        @endif
                        @if($car->new_tires_sport)
                        - New Tires Sports Type<br>
                        @endif
                        @if($car->car_navigation)
                        - Car Navigation + Multimedia System<br>
                        @endif
                        @if($car->back_monitor_camera)
                        - Back Monitor Camera<br>
                        @endif
                        @if($car->fresh_interior)
                        - Fresh Interior<br>
                        @endif
                        @if($car->neat_clean_seats)
                        - Beautiful Neat Clean Seats<br>
                        @endif
                        @if($car->dvd_options)
                        - DVD Options<br>
                        @endif
                        @if($car->remote_entry)
                        - Remote Entry<br>
                        @endif
                        @if($car->discharged_lamp)
                        - Discharged Lamp<br>
                        @endif
                        @if($car->aluminum_foil)
                        - Aluminum Foil<br>
                        @endif
                        @if($car->drive_system)
                        - Drive system 2WD<br>
                        @endif
                        @if($car->power_outlet)
                        - Power Outlet<br>
                        @endif
                        @if($car->video_input)
                        - Video Input<br>
                        @endif
                        @if($car->tyres_condition)
                        - Excellent Tyres Condition<br>
                        @endif
                        @if($car->exterior_and_interior_condition)
                        - Exterior and Interior both is in very neat clean<br>
                        @endif
                        {!! $car->description !!}
                    </p>
                </section>

                <section class="split">
                    @php 
                    $owner = App\Models\Setting::first();
                    @endphp
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-user"></span>
                            <h3>Name</h3>
                            <span>{{@$owner->owner_name}}</span>
                        </div>
                    </section>

                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-envelope"></span>
                            <h3>Email</h3>
                            <a href="mailto:{{@$owner->email}}">{{@$owner->email}}</a>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-phone"></span>
                            <h3>Phone</h3>
                            <a href="tel:{{@$owner->phone}}">{{@$owner->phone}}</a>
                            {{-- <span>+1 333 4040 5566</span> --}}
                        </div>
                    </section>

                    {{-- <section>
                        <div class="contact-method">
                            <span class="icon alt fa-phone"></span>
                            <h3>Mobile Phone</h3>
                            <span>+1 333 5550 3366</span>
                        </div>
                    </section> --}}
                </section>
            </div>
        </section>
</div>
@endsection
@section('scripts')
@endsection
