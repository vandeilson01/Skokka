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

class AllAnuncios extends Controller
{
    public function index()
    {
       
        $anuncios = AnunciosModel::latest()->paginate(10);
        
        return view('adm.anuncios',compact('anuncios'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.anuncios.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        $ids = Auth::guard('acom')->user()->id;

        $salvar = AnunciosModel::create([
            'name' => md5(time()),
            'categoria' => $request->input('categoria'),
            'id_acompanhante' => $acom->id ?? '0',
            'cidade' =>  $request->input('cidade'),
            'estado' =>   $request->input('estado'),
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
            'plan_time' => $request->input('plan_time') ?? '',
        ]);

            
        if($salvar){
            
            $files = [];
            if ($request->file('files')){
                foreach($request->file('files') as $key => $file)
                {
                    $fileName = time().rand(1,99).'.'.$file->extension();  
                    $file->move(public_path('anuncios/'.$ids.'/'.$salvar->id), $fileName);
                    $files[]['name'] = $fileName;

                    AnunciosImg::insert([
                        'id_anuncio'=> $salvar->id,
                        'img' => $fileName,
                        'file' => $fileName,
                    ]);
                }
            }
        } 
     

        $categoria = $request->input('categoria');
        $cidade =  $request->input('city');
        $estado =  $request->input('state');
        $endereco = $request->input('endereco');
        $postal = $request->input('postal');
        $distrito = $request->input('distrito');
        $idade = $request->input('idade');
        $titulo_anuncio = $request->input('titulo_anuncio');
        $texto = $request->input('texto');
        $tipo_contato = $request->input('tipo_contato');
        // $email = $request->input('email');
        $telefone = $request->input('telefone');
        $whatsapp = $request->input('whatsapp');
        $suas_fotos = $request->input('suas_fotos');
        // $termos = $request->input('termos');
        $plan = $request->input('plan');

        $metodo ='';
        $card_token = '';

        //plans

        //pegando plano
        $newplan = PlansModel::where('id', $plan)->first();
        $valor = $newplan->value ?? '';
        $titulo = $newplan->abrev ?? '';
        $dias = $newplan->days ?? '';
        $plan = $newplan->id ?? '';
        $acom = $acom->id ?? '';
        $quantidade = '1';
        $id = $salvar->id;

        
  
        $plans = PlansModel::where("id", $plan)->first();

        $access_token =  MercadoPagoModel::first()->token_1 ?? MercadoPagoModel::first()->token_teste;

        MercadoPago\SDK::setAccessToken($access_token); 
        
        $preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();
    
        // $item->id = 'idanuncio';
        $item->title = $titulo;
        $item->quantity = $quantidade;
        $item->unit_price = (double)$valor;
        $preference->items = array($item);
    
        // $mais = $salvar->id.'?acom='.$acom->id.'?days='.$plans->days;

        // $mais = (int)$salvar->id;

        
        
        $mais = 'id='.(int)$salvar->id.'?acom='.$ids.'?days='.(int)$plans->days;

        // dd($mais);

        $preference->back_urls = array(
          'success' => 'https://sitesbr.online/acompanhantes/mercadopago/success?'.$mais,
          'failure' => 'https://sitesbr.online/acompanhantes/mercadopago/failure?'.$mais,
          'pending' => 'https://sitesbr.online/acompanhantes/mercadopago/pending?'.$mais,
        );
        
        $preference->notification_url = 'https://sitesbr.online/acompanhates/notification';
        $preference->external_reference = 4545;
        $preference->save();
    
        $link =  $preference->init_point;
        
        return redirect($link);
        // return redirect()->route('acomPanel')
        //                 ->with('success','Anúncio publicado.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(AnunciosModel $anuncios, $id)
    {   
        $anuncio = AnunciosModel::where('id', $id)->first();
        $anuncioimg = AnunciosImg::where('id_anuncio', $id)->get();
        $acompanhante = User::where('id', $anuncio->id_acompanhante)->first();
        return view('adm.anuncios.show',compact('anuncio', 'anuncioimg','acompanhante'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnunciosModel $anuncios, $id)
    { 
        $anuncio = AnunciosModel::where('id', $id)->first();
        $anuncioimg = AnunciosImg::where('id_anuncio', $id)->get();
        $acompanhante = User::where('id', $anuncio->id_acompanhante)->first();
        return view('adm.anuncios.edit',compact('anuncio', 'anuncioimg','acompanhante'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnunciosModel $anuncio, AnunciosImg $img, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     // 'detail' => 'required',
        // ]);

             
        $anuncios = AnunciosModel::latest()->paginate(10);
         
        $anuncio->where('id', $id)->update([
            'categoria' => $request->input('categoria'),
            'cidade' => $request->input('cidade'),
            'endereco' => $request->input('endereco'),
            'postal' => $request->input('postal'),
            'distrito' => $request->input('distrito'),
            'idade' => $request->input('idade'),
            'titulo_anuncio' => $request->input('titulo_anuncio'),
            'texto' => $request->input('texto'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
        ]);

        $img->where('id_anuncio', $id)->delete();

        $files = [];

        if ($request->file('imagens')){
 
            foreach($request->file('imagens') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('anuncios/'.Auth::guard('acom')->user()->id.'/'.$salvar->id), $fileName);
                $files[]['name'] = $fileName;


                dd($files[]);
 
                $mas = AnunciosImg::insert([
                    'id_anuncio'=> $id,
                    'img' => $fileName,
                    'file' => $fileName,
                ]);

                dd($mas);
            }
        }
        
        return view('adm.anuncios',compact('anuncios'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnunciosModel $anuncio,AnunciosImg $img, $id)
    {
        $anuncio->where('id', $id)->delete();
        $img->where('id_anuncio', $id)->delete();

        $anuncios = AnunciosModel::latest()->paginate(10);
        
        return view('adm.anuncios',compact('anuncios'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

  
    
    
}
