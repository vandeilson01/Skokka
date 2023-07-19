<?php

namespace App\Http\Controllers\Home;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\CategoryPlus;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     public function index(): View {
        $category = Category::all();
        $categoryplus = CategoryPlus::all();
        $citys = City::all();

        return view("home.page",['categories' => $category, 'citys' => $citys]);
     }
    //  public function redirectSearch(Request $request): RedirectResponse {
    public function redirectSearch(Request $request){
        $categories = $request->categories;
        $terms = $request->terms;
        $state = $request->state;
        $city = $request->city;
       
        return view('home.search', ['all' => $request->input()]);
    }
}
