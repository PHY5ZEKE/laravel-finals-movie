<?php

namespace App\Http\Controllers;
use App\Models\Theater;    

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

   public function store(Request $request){

    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'capacity' => 'required|numeric|min:1',
    ]);

    Theater::create($request->only(['name', 'location', 'capacity']));

    return redirect()->route('management.theater.index');

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

