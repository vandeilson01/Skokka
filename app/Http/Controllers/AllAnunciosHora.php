<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\AnunciosModel;
use App\Models\AnunciosImg;
use App\Models\AnunciosHorarios;
use App\Models\Assinatuaras;
use App\Models\PlansModel;
use App\Models\User;

use App\Http\Controllers\MercadoPago;

class AllAnunciosHora extends Controller
{
    public function index()
    {
       
        $anuncios =  AnunciosHorarios::latest()->paginate(10);
        
        return view('adm.anuncioshora',compact('anuncios'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.anuncioshora.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        AnunciosHorarios::create([
            'cod' => $request->input('cod'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);
         
        return back();
    }
  
    /**
     * Display the specified resource.
     */
    public function show(AnunciosHorarios $anuncios, $id)
    {   
        $hora = AnunciosHorarios::where('id', $id)->first();
        return view('adm.anuncioshora.show',compact('hora'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnunciosHorarios $anuncios, $id)
    { 
        $hora = AnunciosHorarios::where('id', $id)->first();
        return view('adm.anuncioshora.edit',compact('hora'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnunciosModel $anuncio, $id)
    {
        
        $anuncios = AnunciosHorarios::latest()->paginate(10);
        
        AnunciosHorarios::where('id', $id)->update([
            'cod' => $request->input('cod'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);
        
        return view('adm.anuncioshora',compact('anuncios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnunciosHorarios $anuncio, $id)
    {

        $anuncio->where('id',$id)->delete();
            
        return back();
    }

  
    
    
}
