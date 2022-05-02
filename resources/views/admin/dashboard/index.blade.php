@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>DASHBOARD | CARS</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{route('admin.user.index')}}">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-primary float-right">All</span>
                                <h5 class="card-title mb-0">Total User</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\User::all()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="{{route('admin.country.index')}}">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-info float-right">All</span>
                                <h5 class="card-title mb-0">Total Country</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Country::all()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="{{route('admin.car.index')}}">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-success float-right">All</span>
                                <h5 class="card-title mb-0">Total Cars</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Car::all()->count()}}                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{route('admin.car_model.index')}}">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-warning float-right">All</span>
                                <h5 class="card-title mb-0">Total Car Model</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\CarModel::all()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="{{route('admin.category.index')}}">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-success float-right">All</span>
                                <h5 class="card-title mb-0">Total Category</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Category::all()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="{{route('admin.type.index')}}">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <span class="badge badge-danger float-right">All</span>
                                <h5 class="card-title mb-0">Total Car Type</h5>
                            </div>
                            <div class="card-body my-2">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                            {{App\Models\Type::all()->count()}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-sm shadow-sm mb-1">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection