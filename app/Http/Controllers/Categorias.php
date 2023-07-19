<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryPlus;

class Categorias extends Controller
{
    public function index()
    {
        $categorias = Category::latest()->paginate(10);
        
        return view('adm.categorias',compact('categorias'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.categorias.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
         
        $salvar = Category::create([
            'name' => $request->input('name'),
            'slug' =>  $request->input('slug'),
            'description' =>   $request->input('description'),
        ]);

         
        if($salvar){

            if ($request->file('image_url_dir')){

                $file = $request->file('image_url_dir');
 
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();     
                
                $fileName = time().rand(1,99).'.'.$extension;
                
                $file->move(public_path('categories/'), $fileName);

                Category::where('id', $salvar->id)->update([
                    'image_url_dir' => 'categories/'.$fileName,
                ]);
                
            }
        } 
        

        $categorias = Category::latest()->paginate(10);

        return view('adm.categorias',compact('categorias'))->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Category $categoria)
    {
        $plus = CategoryPlus::where('categories_id', $categoria->id)->get();
        return view('adm.categorias.show',compact('categoria', 'plus'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categoria)
    {
        $plus = CategoryPlus::where('categories_id', $categoria->id)->get();
        return view('adm.categorias.edit',compact('categoria', 'plus'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categorias, $id)
    {
 
      
        $salvar = Category::where('id', $id)->update([
            'name' => $request->input('name'),
            'slug' =>  $request->input('slug'),
            'description' =>   $request->input('description'),
        ]);

         
        if($salvar){

            if ($request->file('image_url_dir')){

                $file = $request->file('image_url_dir');
 
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();     
                
                $fileName = time().rand(1,99).'.'.$extension;
                
                $file->move(public_path('categories/'), $fileName);

                Category::where('id', $id)->update([
                    'image_url_dir' => 'categories/'.$fileName,
                ]);
                
            }
        } 
        

        $categorias = Category::latest()->paginate(10);

        return view('adm.categorias',compact('categorias'))->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('success','Product created successfully.');
        

    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categorias, $id)
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
        
        Category::create($request->all());

        $categorias = Category::latest()->paginate(10);
         
        return redirect()->route('admin.categorias')->with('i', (request()->input('page', 1) - 1) * 5)
                        ->with('success','Product created successfully.');
    }
}
