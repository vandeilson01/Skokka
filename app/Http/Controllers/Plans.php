<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlansModel;

class Plans extends Controller
{
    //

    public function index()
    {
        $planos = PlansModel::latest()->paginate(10);
        
        return view('adm.planos',compact('planos'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.planos.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        PlansModel::create($request->all());
         
        return redirect()->route('adm.planos')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(PlansModel $plano)
    {
        return view('adm.planos.show',compact('plano'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlansModel $plano)
    {
        return view('adm.planos.edit',compact('plano'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlansModel $planos): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $planos->update($request->all());
        
        return view('adm.planos');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlansModel $planos): RedirectResponse
    {
        $planos->delete();
         
        return view('adm.planos');
    }

}
