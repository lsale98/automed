<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarsMarketController extends Controller
{

    public function index()
    {
        $cars = Car::where('sell_id', 1)->orderBy('created_at', 'desc')->paginate(10);

        return view('cars-market.index')->with('cars', $cars);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        $car->sell_id = $request->input('sell_id');

        $car->save();

        if ($request->input('sell_id') == 1) {
            return redirect('/cars/' . $id . '')->with('success', 'You added car to market place');
        } else {
            return redirect('/cars/' . $id . '')->with('success', 'You pull car from market place');
        }
    }
}
