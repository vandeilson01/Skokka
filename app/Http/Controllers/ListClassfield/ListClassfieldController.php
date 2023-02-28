<?php

namespace App\Http\Controllers\ListClassfield;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\State;
use App\Models\Category;
use App\Models\User;
class ListClassfieldController extends Controller
{
    public function list() : View {

        $category = State::all();
        
         return view('list.list');
    }
}
