<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Repair;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cars.index');
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
        $this->validate($request, [
            'brand' => 'required',
            'car_model' => 'required',
            'engine_capacity' => 'required',
            'horse_power' => 'required',
            'car_body' => 'required',
            'car_image' => 'image|nullable|max:1999'
        ]);
        // Handle file upload
        if ($request->hasFile('car_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('car_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $xtension = $request->file('car_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $xtension;
            // Upload image
            $path = $request->file('car_image')->storeAs('public/car_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $car = new Car();
        $car->user_id = auth()->user()->id;
        $car->brand = $request->input('brand');
        $car->car_model = $request->input('car_model');
        $car->horse_power = $request->input('horse_power');
        $car->engine_capacity = $request->input('engine_capacity');
        $car->car_body = $request->input('car_body');
        $car->car_image = $fileNameToStore;
        $car->save();

        return redirect()->route('home')->with('success', 'You successful added car profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $repairs = Repair::where('car_id', $id)->get();
        return view('cars.show')->with(array('car' => $car, 'repairs' => $repairs));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand' => 'required',
            'car_model' => 'required',
            'engine_capacity' => 'required',
            'horse_power' => 'required',
            'car_body' => 'required',
            'car_image' => 'image|nullable|max:1999'
        ]);
        // Handle file upload
        if ($request->hasFile('car_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('car_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $xtension = $request->file('car_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $xtension;
            // Upload image
            $path = $request->file('car_image')->storeAs('public/car_images', $fileNameToStore);
        }
        $car = Car::find($id);
        $car->brand = $request->input('brand');
        $car->car_model = $request->input('car_model');
        $car->engine_capacity = $request->input('engine_capacity');
        $car->horse_power = $request->input('horse_power');
        $car->car_body = $request->input('car_body');
        $car->servicer_id = 0;
        if ($request->hasFile('car_image')) {
            Storage::delete('public/car_images/' . $car->car_image);
            $car->car_image = $fileNameToStore;
        }
        $car->save();
        return redirect('/cars/' . $id . '')->with('success', 'You edit Car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        // Check for correct user
        if (auth()->user()->id != $car->user->id) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
        if ($car->car_image != 'noimage.jpg') {
            // Delete image
            Storage::delete('public/car_images/' . $car->car_image);
        }
        $car->delete();
        return redirect('/home')->with('success', 'Car Removed');
    }
}
