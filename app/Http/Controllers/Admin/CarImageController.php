<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarImage;
use Illuminate\Http\Request;

class CarImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CarImage::create($request->all());
        foreach($request->images as $image)
        {
            CarImage::create([
                'image' => $image,
                'car_id' => $request->car_id
            ]);
        }
        toastr()->success('Car  Image is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarImage  $carImage
     * @return \Illuminate\Http\Response
     */
    public function show(CarImage $carImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarImage  $carImage
     * @return \Illuminate\Http\Response
     */
    public function edit(CarImage $carImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarImage  $carImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarImage $carImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarImage  $carImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_image = CarImage::find($id);
        $car_image->delete();
        toastr()->success('Car Image Deleted successfully');
        return redirect()->back();
    }
}
