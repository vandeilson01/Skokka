<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssinaturasModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Assinaturas extends Controller
{
    //

    public function index()
    {
        $assinaturas = AssinaturasModel::where('id_acompanhante','=', Auth::guard('acom')->user()->id)->paginate(10);
        
    return view('acom.planos',compact('assinaturas'))
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
        
        AssinaturasModel::create($request->all());
         
        return redirect()->route('acom.planos')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(AssinaturasModel $assinaturas, $id)
    {

        $assinaturas = AssinaturasModel::where('id', $id)->first();

        return view('acom.assinaturas.show',compact('assinaturas'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssinaturasModel $assinatura)
    {
        return view('acom.planos.edit',compact('assinatura'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssinaturasModel $assinaturas): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $assinaturas->update($request->all());
        
        return view('acom.planos');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssinaturasModel $assinaturas): RedirectResponse
    {
        $assinaturas->delete();
         
        return view('acom.planos');
    }
    
}
