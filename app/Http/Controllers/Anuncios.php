<?php

namespace App\Http\Controllers;

require_once __DIR__.'./../../../vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\AnunciosModel;
use App\Models\AcompanhantesModel;
use App\Models\AnunciosImg;
use App\Models\Assinatuaras;
use App\Models\PlansModel;
use Illuminate\Support\Facades\Hash;

// use App\Http\Controllers\MercadoPago;
use App\Http\Controllers\MercadoPagos;

 
use App\Models\MercadoPagoModel;
 
use MercadoPago;

class Anuncios extends Controller
{
    public function index()
    {
        
        return view('home.publicar');
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.publicar');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dd(1);
        
        
        if($request->input('password')
         === $request->input('passwordtwo')){


            $password = Hash::make($request->input('password'));

            $acom = AcompanhantesModel::create([
                'email' => $request->input('email'),
                'password' => $password,
            ]);

            $ids = $acom->id;

         
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
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        $whatsapp = $request->input('whatsapp');
        $suas_fotos = $request->input('suas_fotos');
        $termos = $request->input('termos');
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
        }else{
            return view('home.publicar')
                ->with('Senhas diferentes');
        }
        
    }
  
    /**
     * Display the specified resource.
     */
    public function show(AnunciosModel $anucio)
    {
        return view('acom.anuncios.show',compact('anucio'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnunciosModel $anucio)
    {
        return view('acom.anuncios.edit',compact('anucio'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnunciosModel $anucio): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $anucio->update($request->all());
        
        return view('acom.anucios');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnunciosModel $anucio): RedirectResponse
    {
        $anucio->delete();
         
        return view('acom.anucios');
    }

  
    public function publicar(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        AnunciosModel::create($request->all());
         
        return redirect()->route('acom.anucios')
                        ->with('success','Product created successfully.');
    }
    
}
