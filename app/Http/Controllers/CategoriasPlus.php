<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryPlus;
use App\Models\City;
use App\Models\State;

class CategoriasPlus extends Controller
{
    public function index()
    {
        $categoriasplus = CategoryPlus::latest()->paginate(10);
        $citys = City::all();
        $states = State::all();
        return view('adm.categoriasplus',compact('categoriasplus','citys','states'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.categoriasplus.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);
        CategoryPlus::create([
            "name" => $request->input('name'),
            "categories_id" => $request->input('categories_id'),
            "details" => $request->input('details'),
            'link' => '00'
        ]);
         
        return back();
    }
  
    /**
     * Display the specified resource.
     */
    public function show(CategoryPlus $plus, $id)
    {
        $plu = CategoryPlus::where('id', $id)->first();
        return view('adm.categoriasplus.show',compact('plu'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryPlus $plus, $id)
    {
        $plu = CategoryPlus::where('id', $id)->first();
        $categorias = Category::get();
        $citys = City::all();
        $states = State::all();
        return view('adm.categoriasplus.edit',compact('plu', 'categorias','states','citys'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryPlus $categorias, $id)
    {
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);

        
        CategoryPlus::where('id', $id)->update([
            'name' =>$request->input('name'),
            'details' =>$request->input('details'),
            // 'link' =>$request->input('link'),
            'categories_id' =>$request->input('categories_id'),
           
        ]);
        
        $categoriasplus = CategoryPlus::latest()->paginate(10);
        
        return back();
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryPlus $categorias, $id)
    {
        $categorias->where('id', $id)->delete();
         
        return back();
    }

  
    public function publicar(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        CategoryPlus::create($request->all());
         
        return redirect()->route('adm.categoriasplus')
                        ->with('success','Product created successfully.');
    }
}
