<?php

namespace App\Http\Controllers;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        // search query
        $search = $request->input("search");
    
        if ($search) {
            $logs = Log::where("action", "like", "%$search%")
                ->orWhere("description", "like", "%$search%")
                ->simplePaginate(5);
        } else {
            $logs = Log::simplePaginate(5);
        }
    
        return view('management.log.index', ['logs' => $logs]);
    }
}
