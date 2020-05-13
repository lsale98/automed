<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')->get();
        return view('home')->with('cars', $cars);
    }

    public function status()
    {
        $cars = Car::orderBy('created_at', 'desc')->get();
        return view('cars.status')->with('cars', $cars);
    }
}
