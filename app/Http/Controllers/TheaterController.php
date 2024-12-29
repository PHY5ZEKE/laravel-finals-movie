<?php

namespace App\Http\Controllers;
use App\Models\Theater;    
use App\Models\Seat;
use App\Helper\LogHelper;

use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function index(Request $request)
    {
        // search query
        $search = $request->input("search");
    
        if ($search) {
            $theaters = Theater::where("name", "like", "%$search%")
                ->orWhere("location", "like", "%$search%")
                ->orWhere("capacity", "like", "%$search%")
                ->simplePaginate(5);
        } else {
            $theaters = Theater::simplePaginate(5);
        }
    
        return view('management.theater.index', ['theaters' => $theaters]);
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
           'imagePath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       // Handle the image upload
       if ($request->hasFile('imagePath')) {
           $file = $request->file('imagePath');
           $fileName = time() . '.' . $file->getClientOriginalExtension();
           $filePath = $file->move(public_path('images/theaters'), $fileName);
       }

       // Create the theater
       $theater = Theater::create([
           'name' => $request->name,
           'location' => $request->location,
           'capacity' => $request->capacity,
           'imagePath' => 'images/theaters/' . $fileName,
       ]);

       // Create seats for the theater
       for ($i = 1; $i <= $theater->capacity; $i++) {
           Seat::create([
               'theater_id' => $theater->theater_id,
               'seat_number' => 'Seat ' . $i,
               'seat_status' => 'available',
           ]);
       }

       // Log the action
       LogHelper::logAction('create_theater', 'Created theater: ' . $theater->name);

       return redirect()->route('management.theater.index')->with('success', 'Theater and seats created successfully.');
   }

   public function show(Theater $theater){

    return view('management.theater.show', ['theater' => $theater]);

   }

   public function edit(Theater $theater){

    return view('management.theater.edit', ['theater' => $theater]);

   }

   public function update(Request $request, Theater $theater)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'location' => 'required|string|max:255',
           'capacity' => 'required|numeric|min:1',
           'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       if ($request->hasFile('imagePath')) {
           $file = $request->file('imagePath');
           $fileName = time() . '.' . $file->getClientOriginalExtension();
           $filePath = $file->move(public_path('images'), $fileName);
           $theater->imagePath = 'images/' . $fileName;
       }

       $theater->update($request->only(['name', 'location', 'capacity']));

       if (isset($filePath)) {
           $theater->imagePath = 'images/' . $fileName;
           $theater->save();
       }

       // Log the action
       LogHelper::logAction('update_theater', 'Updated theater: ' . $theater->name);

       return redirect()->route('management.theater.show', $theater->theater_id);
   }

   public function destroy(Theater $theater)
   {
       $theater->delete();
   
       // Log the action
       LogHelper::logAction('delete_theater', 'Deleted theater: ' . $theater->name);
   
       return redirect()->route('management.theater.index')->with('success', 'Theater deleted successfully.');
   }
   

   

} 

