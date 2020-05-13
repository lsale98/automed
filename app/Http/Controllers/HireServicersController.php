<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class HireServicersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // show all auth user cars
        $cars = Car::orderBy('created_at', 'desc')->get();

        return view('hireServicers.index')->with('cars', $cars);
    }

    public function update(Request $request, $id)
    {

        $car = Car::find($request->input('id'));
        $car->id = $request->input('id');
        $car->brand = $request->input('brand');
        $car->car_model = $request->input('car_model');
        $car->engine_capacity = $request->input('engine_capacity');
        $car->horse_power = $request->input('horse_power');
        $car->car_body = $request->input('car_body');
        $car->servicer_id = $id;
        $car->save();
        return redirect()->back()->with('success', 'You hired Servicer');
    }
}
