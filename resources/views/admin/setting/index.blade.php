@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Update Setting | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Setting</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.setting.update',$setting->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Website / Owner Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Owner Name" value="{{@$setting->name}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required placeholder="Address" value="{{@$setting->email}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required placeholder="Phone" value="{{@$setting->phone}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" required placeholder="Address" value="{{@$setting->address}}">
                        </div>
                   </div>
                   <div class="row">
                        <h3><strong>Sale Terms Setting</strong></h3>
                        <div class="form-group col-12">
                            <label class="form-label">Sale Terms Title</label>
                            <input type="text" class="form-control" required name="sales_terms_title"   placeholder="Sales Terms Title" value="{{@$setting->sales_terms_title}}">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Sale Terms Content</label>
                            <textarea name="sales_terms" data-provide="markdown" rows="14">{!! $setting->sales_terms !!}</textarea>
                        </div>
                    </div>
                   <div class="row">
                        <h3><strong>About Us Setting</strong></h3>
                        <div class="form-group col-12">
                            <label class="form-label">About Us Title</label>
                            <input type="text" class="form-control" required name="about_us_title"   placeholder="About Us Title" value="{{@$setting->about_us_title}}">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">About Us Content</label>
                            <textarea name="about_us" data-provide="markdown" rows="14">{!! $setting->about_us !!}</textarea>
                            {{-- <textarea name="about_us" class="form-control" rows="3"></textarea> --}}
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-12">
                            <h3><strong>Social Media Setting</strong></h3>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control" required name="instagram_link"   placeholder="Instagram Url" value="{{@$setting->instagram_link}}">
                        </div>  
                        <div class="form-group col-4">
                            <label class="form-label">Twitter</label>
                            <input type="text" class="form-control" required name="twitter_link"   placeholder="Twitter Url" value="{{@$setting->twitter_link}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Facebook</label>
                            <input type="text" class="form-control" required name="facebook_link"   placeholder="Facebook Url" value="{{@$setting->facebook_link}}">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update Setting</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection