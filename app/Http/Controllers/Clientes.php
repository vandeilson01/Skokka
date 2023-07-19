<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class Clientes extends Controller
{
    public function index(): View
    {
        $clientes = User::latest()->paginate(10);
        
        return view('adm.clientes',compact('clientes'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('adm.clientes.create');
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
        
        User::create($request->all());
         
        return redirect()->route('adm.clientes')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(User $cliente): View
    {
        return view('adm.clientes.show',compact('cliente'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $cliente): View
    {
        return view('adm.clientes.edit',compact('cliente'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $cliente): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $cliente->update($request->all());
        
        return view('adm.clientes');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $cliente): RedirectResponse
    {
        $cliente->delete();
         
        return view('adm.clientes');
    }
}
