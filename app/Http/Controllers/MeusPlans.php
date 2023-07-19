<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assinaturas;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MeusPlans extends Controller
{
    //

    public function index()
    {
        $planos = Assinaturas::where('id_acompanhante', Auth::guard('acom')->user()->id)->paginate(10);
        
        return view('acom.planos',compact('planos'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acom.planos.create');
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
        
        Assinaturas::create($request->all());
         
        return redirect()->route('acom.planos')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Assinaturas $planos)
    {
        return view('acom.planos.show',compact('planos'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assinaturas $plano)
    {
        return view('acom.planos.edit',compact('plano'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assinaturas $planos): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $planos->update($request->all());
        
        return view('acom.planos');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assinaturas $planos): RedirectResponse
    {
        $planos->delete();
         
        return view('acom.planos');
    }

}
