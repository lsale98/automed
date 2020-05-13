<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Repair;


class RepairsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:servicer');
    }
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
        return view('repairs.create');
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
            'car_id' => 'required',
            'repair_title' => 'required',
            'repair_info' => 'required',
        ]);

        $repair = new Repair();
        $repair->servicer_id = auth()->user()->id;
        $repair->car_id = $request->input('car_id');
        $repair->repair_title = $request->input('repair_title');
        $repair->repair_info = $request->input('repair_info');

        $repair->save();
        return redirect()->back()->with('success', 'Successful added repair');
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
        return view('repairs.show')->with(array('car' => $car, 'repairs' => $repairs));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
