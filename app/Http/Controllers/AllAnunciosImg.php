<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\AnunciosModel;
use App\Models\AnunciosImg;
use App\Models\Assinatuaras;
use App\Models\PlansModel;
use App\Models\User;

use App\Http\Controllers\MercadoPago;

class AllAnunciosImg extends Controller
{
    public function index()
    {
       
        $anuncios = AnunciosImg::latest()->paginate(10);
        
        return view('adm.anunciosimg',compact('anuncios'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.anunciosimg.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(1);
        $request->validate([
            'categoria' => 'required',
            'cidade' => 'required',

            'idade' => 'required',
            'titulo' => 'required',

            // 'whatsapp' => 'required',
            'suas_fotos' => 'required',
            'e_termos' => 'required',
            'plan' => 'required',
 
        ]);
 
        $salvar = AnunciosModel::create([
            'name' => md5(time()),
            'categoria' => $request->input('categoria'),
            'id_acompanhante' => Auth::guard('acom')->user()->id ?? '0',
            'cidade' => $request->input('cidade'),
            'endereco' => $request->input('endereco'),
            'postal' => $request->input('cep'),
            'distrito' => $request->input('distrito'),
            'idade' => $request->input('idade'),
            'titulo_anuncio' => $request->input('titulo'),
            'texto' => $request->input('texto'),
            'tipo_contato' => $request->input('tipo_contato'),
            'email' => $request->input('email'),
            'telefone' => $request->input('num_tel'),
            'whatsapp' => $request->input('e_whatsapp'),
            'suas_fotos' => $request->input('e_fotos'),
            'termos' => $request->input('e_termos'),
            'plan' => $request->input('id_plan'),
        ]);

        // dd($salvar->id);


        // dd($request->file('files'));

        if($salvar){
            
            $files = [];
            if ($request->file('files')){
                foreach($request->file('files') as $key => $file)
                {
                    $fileName = time().rand(1,99).'.'.$file->extension();  
                    $file->move(public_path('anuncios/'.Auth::guard('acom')->user()->id.'/'.$salvar->id), $fileName);
                    $files[]['name'] = $fileName;


                    AnunciosImg::insert([
                        'id_anuncio'=> $salvar->id,
                        'img' => $fileName,
                        'file' => $fileName,
                    ]);
                }
            }
    

        }
        

        // dd($request->all());


 
        //Assinatuaras:insert;


        $categoria = $request->input('categoria');
        $cidade = $request->input('cidade');
        $endereco = $request->input('endereco');
        $postal = $request->input('postal');
        $distrito = $request->input('distrito');
        $idade = $request->input('idade');
        $titulo_anuncio = $request->input('titulo_anuncio');
        $texto = $request->input('texto');
        $tipo_contato = $request->input('tipo_contato');
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        $whatsapp = $request->input('whatsapp');
        $suas_fotos = $request->input('suas_fotos');
        $termos = $request->input('termos');
        $plan = $request->input('plan');

        $metodo ='';
        $card_token = '';

        //plans

        $newplan = PlansModel::where('id', 'plan')->first();

        $valor = $newplan->value ?? '';
        $descricao = $newplan->abrev ?? '';

        MercadoPago::initial($email, $metodo, $descricao, $card_token);


        dd(1);

         
        return redirect()->route('acomPanel')
                        ->with('success','Anúncio publicado.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(AnunciosImg $anuncios, $id)
    {   

        $anuncioimg = AnunciosImg::where('id', $id)->get();
        return view('adm.anunciosimg.show',compact('anuncio', 'anuncioimg','acompanhante'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnunciosImg $anuncios, $id)
    { 
        $anuncioimg = AnunciosImg::where('id', $id)->first();
        $anuncio =  !empty($anuncioimg->id_anuncio) ? AnunciosImg::where('id', $anuncioimg->id_anuncio)->first() : '';
        $acompanhante = User::where('id', $anuncio->id_acompanhante ?? '')->first();
        return view('adm.anunciosimg.edit',compact('anuncio', 'anuncioimg','acompanhante'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnunciosImg $anuncio, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     // 'detail' => 'required',
        // ]);

        $anuncio->where('id', $id)->delete();

        $files = [];
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('anuncios/'.Auth::guard('acom')->user()->id.'/'.$salvar->id), $fileName);
                $files[]['name'] = $fileName;


                AnunciosImg::insert([
                    'id_anuncio'=> $salvar->id,
                    'img' => $fileName,
                    'file' => $fileName,
                ]);
            }
        }


        $files = [];
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('anuncios/'.Auth::guard('acom')->user()->id.'/'.$salvar->id), $fileName);
                $files[]['name'] = $fileName;


                AnunciosImg::insert([
                    'id_anuncio'=> $salvar->id,
                    'img' => $fileName,
                    'file' => $fileName,
                ]);
            }
        }

        
        $anuncios = AnunciosImg::latest()->paginate(10);
        
        return view('adm.anunciosimg',compact('anuncios'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnunciosImg $anuncio, $id)
    {
        $anuncio->where('id', $id)->delete();
         
        return back();
    }

  
    
    
}
