<?php

namespace App\Http\Controllers;
use App\Models\Theater;    
use App\Models\Seat;

use Illuminate\Http\Request;

class TheaterController extends Controller
{
   public function index(){

    $theaters = Theater::simplePaginate(5);

    return view('management.theater.index',['theaters'=>$theaters]);

   }

   public function create(){

    return view('management.theater.create');

   }

   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|numeric|min:1',
        ]);

        // Create the theater
        $theater = Theater::create([
            'name' => $request->name,
            'location' => $request->location,
            'capacity' => $request->capacity,
        ]);

        // Create seats for the theater
        for ($i = 1; $i <= $theater->capacity; $i++) {
            Seat::create([
                'theater_id' => $theater->theater_id,
                'seat_number' => 'Seat ' . $i,
                'seat_status' => 'available',
            ]);
        }

        return redirect()->route('management.theater.index')->with('success', 'Theater and seats created successfully.');
    }

   public function show(Theater $theater){

    return view('management.theater.show', ['theater' => $theater]);

   }

   public function edit(Theater $theater){

    return view('management.theater.edit', ['theater' => $theater]);

   }

    public function update(Request $request, Theater $theater){
    
     $request->validate([
          'name' => 'required|string|max:255',
          'location' => 'required|string|max:255',
          'capacity' => 'required|numeric|min:1',
     ]);
    
     $theater->update($request->only(['name', 'location', 'capacity']));
    
     return redirect()->route('management.theater.show', $theater->theater_id);
    
    }

    public function destroy(Theater $theater){
    
     $theater->delete();
    
     return redirect()->route('management.theater.index');
    
    }

   

} 

