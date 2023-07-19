<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class DropdownController extends Controller
{
    //


    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
                                    ->get(["name", "id"]);
                                    
        return response()->json($data);
    }
}
