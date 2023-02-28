<?php

namespace App\Http\Controllers\PostClassfield;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
class PostClassfieldController extends Controller
{
    public function viewForm(): View
    {
        return view('post.insert',['states' => ['name' => 'aaa' ,'id' =>1],'categories' => ['name' => 'aaa' ,'id' =>1]]);
    }
    public function postInitialForm(Request $request)
    {
        $request->validate(['categories' => 
        'string|required',
        'state' => 'string|required',
        'address' => 'string|required',
        'zipcode' =>'string|required',
        'title' => 'string|required',
        'description' => 'string|required',
        'mobile' => 'string|required',
        'age' => 'string|required',
        'city' => 'string|required'
    ]);
        return view('post.insert',['states' => ['name' => 'aaa' ,'id' =>1],'categories' => ['name' => 'aaa' ,'id' =>1]]);
    }
    public function viewFormPhotos(): View
    {
        return view('post.photos');
    }
    public function viewFormVissibily(): View
    {
        return view('post.visibility');
    }
}
