<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarModel;
use App\Models\Category;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.car.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'air_conditioning'  => $request->air_conditioning?1:0,
            'power_window'  => $request->power_window?1:0,
            'power_mirror'  => $request->power_mirror?1:0,
            'central_locking'  => $request->central_locking?1:0,
            'airbag'  => $request->airbag?1:0,
            'anti_theft_system'  => $request->anti_theft_system?1:0,
            'power_steering'  => $request->power_steering?1:0,
            'anti_brake_system'  => $request->anti_brake_system?1:0,
            'tv'  => $request->tv?1:0,
        ]);
        $car =  Car::create($request->all());
        foreach($request->images as $image)
        {
            CarImage::create([
                'image' => $image,
                'car_id' => $car->id
            ]);
        }
        toastr()->success('Car is Created Successfully');
        return redirect()->route('admin.car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('admin.car.edit')->with('car',$car);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $car = Car::find($id);
        $request->merge([
            'air_conditioning'  => $request->air_conditioning?1:0,
            'power_window'  => $request->power_window?1:0,
            'power_mirror'  => $request->power_mirror?1:0,
            'central_locking'  => $request->central_locking?1:0,
            'airbag'  => $request->airbag?1:0,
            'anti_theft_system'  => $request->anti_theft_system?1:0,
            'power_steering'  => $request->power_steering?1:0,
            'anti_brake_system'  => $request->anti_brake_system?1:0,
            'tv'  => $request->tv?1:0,
        ]);
        $car->update($request->all());
        toastr()->success('Car Informations Updated successfully');
        return redirect()->route('admin.car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        toastr()->success('Car Informations Deleted successfully');
        return redirect()->back();
    }
    public function getCarModels(Request $request)
    {
        if($request->id == 'all'){
            $car_models = CarModel::all();
        } else {
            $car_models = Category::find($request->id)->models;
        }
        
        return response()->json($car_models);
    }
}
