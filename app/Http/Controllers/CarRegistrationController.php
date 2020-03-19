<?php

namespace App\Http\Controllers;

use App\CarRegistration;
use Illuminate\Http\Request;

class CarRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carRegistration.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $locations = CarRegistration::all();

        return view('carRegistration.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $town = request('townshipsUI');
        $city = request('citiesUI');
        $address = request('addressUI');

        $carRegistration = new CarRegistration();

        $carRegistration->push('location', [
            $town,
            $city,
            $address
        ]);
        $carRegistration->carClass = request('carClassUI');
        $carRegistration->brand = request('brandUI');
        $carRegistration->line = request('lineUI');
        $carRegistration->model = request('modelUI');
        $carRegistration->bodywork = request('bodyworkUI');
        $carRegistration->passengers = request('passengersUI');
        $carRegistration->save();

        return back()->with('message', 'Added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(CarRegistration $carRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(CarRegistration $carRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarRegistration $carRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarRegistration $carRegistration)
    {
        //
    }
}
