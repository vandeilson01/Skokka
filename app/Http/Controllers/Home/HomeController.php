<?php

namespace App\Http\Controllers\Home;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
class HomeController extends Controller
{
     public function index(): View {
         return view("home.page");
     }
     public function redirectSearch(Request $request): RedirectRessponse {
        $categories = $request->categories;
        $terms = $request->terms;
        $state = $request->state;
        $city = $request->city;
        dd($request->input());
    }
}
