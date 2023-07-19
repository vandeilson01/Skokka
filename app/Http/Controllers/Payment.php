<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentModel;

class Payment extends Controller
{
    public function index()
    {
        $pagamentos = PaymentModel::latest()->paginate(10);
        
        return view('adm.pagamentos',compact('pagamentos'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.pagamentos.create');
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
        
        PaymentModel::create($request->all());
         
        return redirect()->route('adm.pagamentos')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(PaymentModel $pagamento)
    {
        return view('adm.pagamentos.show',compact('pagamento'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentModel $pagamento)
    {
        return view('adm.pagamentos.edit',compact('pagamento'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $pagamentos = AnunciosHorarios::latest()->paginate(10);
        
        // AnunciosHorarios::where('id', $id)->update([
        //     'id_colletion' => $request->input('id_colletion'),
        //     'status' => $request->input('status'),
        // ]);
        
        // return view('adm.anuncioshora',compact('pagamentos'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentModel $pagamento, $id)
    {
        $pagamento->where('id',$id)->delete();
            
        return back();
    }
}
