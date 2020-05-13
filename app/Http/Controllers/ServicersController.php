<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicer;
use App\Car;
use App\Comment;

class ServicersController extends Controller
{

    public function index()
    {

        $servicers = Servicer::orderBy('created_at', 'desc')->paginate(10);
        $cities = Servicer::all('city');

        return view('servicers.index')->with(array('servicers' => $servicers, 'cities' => $cities));
    }

    public function filter(Request $request)
    {
        $cities = Servicer::all('city');

        if ($request->input('city') == 'all') {

            $servicers = Servicer::orderBy('created_at', 'desc')->paginate(10);
        } else {

            $servicers = Servicer::where('city', $request->input('city'))->paginate(10);
        }
        return view('servicers.index')->with(array('servicers' => $servicers, 'cities' => $cities));
    }

    public function show($id)
    {
        $servicer = Servicer::find($id);
        $comments = Comment::where('servicer_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $countComments = Comment::where('servicer_id', $id)->get();

        return view('servicers.show')->with(array('servicer' => $servicer, 'comments' => $comments, 'countComments' => $countComments));
    }

    public function update(Request $request, $id)
    {

        $car = Car::find($id);
        $car->id = $request->input('id');
        $car->brand = $request->input('brand');
        $car->car_model = $request->input('car_model');
        $car->engine_capacity = $request->input('engine_capacity');
        $car->horse_power = $request->input('horse_power');
        $car->car_body = $request->input('car_body');
        $car->servicer_id = 0;
        $car->save();
        return redirect()->back()->with('success', 'Service is finished for ' . $car->brand . '');
    }
}
