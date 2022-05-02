<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Country;
use App\Models\Message;
use App\Models\Type;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showCar(Request $request)
    {
        $model_html = '';
        if($request->type_id && $request->condition && $request->category_id)
        {
            $cars = Car::where('type_id',$request->type_id)
            ->where('condition',$request->condition)
            ->where('category_id',$request->category_id)
            ->where('make_id',$request->make_id)
            ->paginate(20);
            $model = CarModel::find($request->make_id);
            if($model)
            {
                $model_html = "<option selected>".$model->name."</option>";
            }
        }elseif($request->type_id && $request->category_id)
        {
            $cars = Car::where('type_id',$request->type_id)
            ->where('category_id',$request->category_id)
            ->where('make_id',$request->make_id)
            ->paginate(20);
            $model = CarModel::find($request->make_id);
            if($model)
            {
                $model_html = "<option selected>".$model->name."</option>";
            }
        }elseif($request->condition && $request->category_id)
        {
            $cars = Car::where('condition',$request->condition)
            ->where('category_id',$request->category_id)
            ->where('make_id',$request->make_id)
            ->paginate(20);
            $model = CarModel::find($request->make_id);
            if($model)
            {
                $model_html = "<option selected>".$model->name."</option>";
            }
        }elseif($request->type_id && $request->condition)
        {
            $cars = Car::where('type_id',$request->type_id)->where('condition',$request->condition)->paginate(20);
        } elseif($request->type_id)
        {
            $cars = Car::where('type_id',$request->type_id)->paginate(20);
        }elseif($request->condition)
        {
            $cars = Car::where('condition',$request->condition)->paginate(20);
        }elseif($request->category_id)
        {
            $cars = Car::where('category_id',$request->category_id)
            ->where('make_id',$request->make_id)
            ->paginate(20);
            $model = CarModel::find($request->make_id);
            if($model)
            {
                $model_html = "<option selected>".$model->name."</option>";
            }
        }
        else{
            $cars = Car::paginate(20);
        }
        return view('front.cars.index',compact('cars','model_html'));
    }
    public function showCarDetails($name)
    {
        $car = Car::where('name',str_replace('_', ' ',$name))->first();
        return view('front.cars.show',compact('car'));
    }
    public function showCategory()
    {
        return view('front.category.index');
    }
    public function showCategoryDetails($name)
    {
        $category = Category::where('name',str_replace('_', ' ',$name))->first();
        $cars = Car::where('category_id',$category->id)->paginate(20);
        return view('front.category.show',compact('category','cars'));
    }
    public function showTypes()
    {
        return view('front.type.index');
    }
    public function showTypeDetails($name)
    {
        $type = Type::where('name',str_replace('_', ' ',$name))->first();
        $cars = Car::where('type_id',$type->id)->paginate(20);
        return view('front.type.show',compact('type','cars'));
    }
    public function showCountries()
    {
        return view('front.country.index');
    }
    public function showCountriesDetails($name)
    {
        $country = Country::where('name',str_replace('_', ' ',$name))->first();
        $cars = Car::where('country_id',$country->id)->paginate(20);
        return view('front.country.show',compact('country','cars'));
    }
    public function showBlogs()
    {
        return view('front.blog.index');
    }
    public function showBlogsDetails($title)
    {
        $blog = Blog::where('title',str_replace('_', ' ',$title))->first();
        $blog->update([
            'view' => $blog->view+1
        ]);
        return view('front.blog.show',compact('blog'));
    }
    
    public function showTestimonials()
    {
        return view('front.testimonials.index');
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
    public function SaveMessage(Request $request)
    {
        Message::create($request->all());
        toastr()->success('Message is Send Successfully');
        return redirect()->back();
    }
    public function showBlogCategory()
    {
        return view('front.blog_category.index');
    }
    public function showBlogCategoryDetails($name)
    {
        $category = BlogCategory::where('name',str_replace('_', ' ',$name))->first();
        $blogs = Blog::where('blog_category_id',$category->id)->paginate(20);
        return view('front.blog_category.show',compact('category','blogs'));
    }
}
