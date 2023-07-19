<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcompanhantesModel;

use Illuminate\Support\Facades\Hash;

class Acompanhantes extends Controller
{
    public function index()
    {
        $acompanhantes = AcompanhantesModel::latest()->paginate(10);
        
        return view('adm.acompanhantes',compact('acompanhantes'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.acompanhantes.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);

        
        if($request->input('password')
         === $request->input('passwordtwo')){


            $password = Hash::make($request->input('password'));

            AcompanhantesModel::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $password,
            ]);
        
         
        return back();

        }
    }
  
    /**
     * Display the specified resource.
     */
    public function show(AcompanhantesModel $acompanhante)
    {
        return view('adm.acompanhantes.show',compact('acompanhante'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcompanhantesModel $acompanhante)
    {
        return view('adm.acompanhantes.edit',compact('acompanhante'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcompanhantesModel $acompanhante): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $acompanhante->update($request->all());
        
        return view('adm.acompanhantes');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcompanhantesModel $acompanhante)
    {
        $acompanhante->delete();
         
        return back();
    }

  
    public function publicar(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        AcompanhantesModel::create($request->all());
         
        return redirect()->route('adm.acompanhantes')
                        ->with('success','Product created successfully.');
    }
}
