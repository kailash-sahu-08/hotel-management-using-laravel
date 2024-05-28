<?php

namespace App\Http\Controllers;
use App\Models\hotels;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $visited = DB::select('select * from places where visited = ?', [1]);	
        // $togo = DB::select('select * from places where visited = ?', [0]);
      
        // return view('travellist', ['visited' => $visited, 'togo' => $togo ]);
        return view("home");
    }
    public function hotelsPage(){
        $hotels = hotels::get();
        return view('hotel-view.hotels',['hotels'=>$hotels]);
    }
    public function registerHotelsPage(){
        return view('hotel-view.registerHotel');
    }
    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create new hotel
        $hotel = new hotels();
        $hotel->name = $validatedData['name'];
        $hotel->address = $validatedData['address'];
        $hotel->description = $validatedData['description'];
        $hotel->owner_id = Auth::id(); // Assign currently logged in user as owner
        $hotel->save();

        return back()->withSuccess('Hotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = hotels::where('id',$id)->first();
        return view('hotel-view.editHotel',['hotel'=>$hotel]);
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
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create new hotel
        $hotel = hotels::where('id',$id)->first();
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        $hotel->owner_id = Auth::id(); // Assign currently logged in user as owner
        $hotel->save();

        return back()->withSuccess('Hotel updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the hotel by ID or fail with a 404 error
        $hotel = hotels::findOrFail($id);

        // Delete the hotel
        $hotel->delete();
        return back()->withSuccess('Hotel Deleted Successfull.');
    }
}
