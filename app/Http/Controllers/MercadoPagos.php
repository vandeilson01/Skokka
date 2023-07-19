<?php

namespace App\Http\Controllers;

require_once __DIR__.'./../../../vendor/autoload.php';

use Illuminate\Http\Request;
use App\Models\PlansModel;
use App\Models\PaymentModel;
use App\Models\Assinatuaras;
use App\Models\MercadoPagoModel;
use App\Models\AnunciosModel;
use MercadoPago;

class MercadoPagos extends Controller
{
    //

    public static function ss($valor, $titulo, $quantidade)
    {

        $access_token =  MercadoPagoModel::first()->token_1 ?? MercadoPagoModel::first()->token_teste;

        MercadoPago\SDK::setAccessToken($access_token); 
        
        $preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();
    
        $item->title = $titulo;
        $item->quantity = $quantidade;
        $item->unit_price = (double)$valor;
        $preference->items = array($item);
    
        $preference->back_urls = array(
            'success' => 'https://sitesbr.online/acompanhantes/mercadopano/success',
            'failure' => 'https://sitesbr.online/acompanhantes/mercadopano/failure',
            'pending' => 'https://sitesbr.online/acompanhantes/mercadopano/pending',
        );
        
        $preference->notification_url = 'https://sitesbr.online/acompanhates/notification';
        $preference->external_reference = 4545;
        $preference->save();
    
        $link =  $preference->init_point;
    
        // return redirect($link);
    
    }
    
     public function mais($id='',$valor='55.00', $titulo='kndsjdns', $quantidade='1',$acom='', $plan='')
    {

      if(!empty($id)){
 
        $days = PlansModel::where("id", $plan)->first();

        $access_token =  MercadoPagoModel::first()->token_1 ?? MercadoPagoModel::first()->token_teste;

        MercadoPago\SDK::setAccessToken($access_token); 
        
        $preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();
    
        $item->id = 'idanuncio';
        $item->title = $titulo;
        $item->quantity = $quantidade;
        $item->unit_price = (double)$valor;
        $preference->items = array($item);
    
        $mais = $id.'?acom='.$id.'?days='.$plans->days;
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

      }else{

        return redirect('/publicar');

      }
    
    }


    public function success(Request $request){
    
      AnunciosModel::where('id', $request->id)->update([
        'collection_id' => $request->input('collection_id'),
        'status' => $request->input('collection_status'),
        'expired' => date(strtotime('today - '.$request->days.' days')),
        'plan_time' => $request->days.' dias',
      ]);

       
      PaymentModel::insert([
        'collection_id' => $request->input('collection_id'),
        'status' => $request->input('collection_status'),
      ]);

      Assinatuaras::insert([
        'name' => md5(time()),
        'id_acompanhantes' => $request->acom,
        'id_anuncio' => $request->id,
        'expired' => date(strtotime('today - '.$request->days.' days')),
        'days' => $request->days.' dias',
      ]);

      $html = '
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <div class="container mt-5 alert alert-success" role="alert">
        <h4 class="alert-heading">Sucesso!</h4>
        <p>Seu pagamento foi realizado com sucesso.</p>
        <hr>
        <a href="https://sitesbr.online/acompanhantes/login" class="btn btn-secondary">Continuar</a>
      </div>';
       

      echo $html;

      return redirect('acompanhantes/login');
      
    }

    public function failure(Request $request){

      // echo json_encode($request->all());
      // echo '1';

      AnunciosModel::where('id', $request->id)->update([
        'collection_id' => $request->input('collection_id'),
        'status' => $request->input('collection_status'),
        'expired' => date(strtotime('today - '.$request->days.' days')),
        'plan_time' => $request->days.' dias',
      ]);

      // Assinatuaras::insert([
      //   'name' => md5(time()),
      //   'id_acompanhantes' => $request->acom,
      //   'id_anuncio' => $request->id,
      //   'expired' => date(strtotime('today - '.$request->days.' days')),
      //   'days' => $request->days.' dias',
      // ]);


      $html = '
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <div class="container mt-5 alert alert-danger" role="alert">
        <h4 class="alert-heading">Falha!</h4>
        <p>Seu pagamento não foi realizado, mas poderar estar paganado ele pelo seu acesso.</p>
        <hr>
        <a href="https://sitesbr.online/acompanhantes/login" class="btn btn-secondary">Continuar</a>
      </div>';

      echo $html;
 
      
    }

    public function pending(Request $request){

      // echo json_encode($request->all());
      // echo '1';

      

      AnunciosModel::where('id', $request->id)->update([
        'collection_id' => $request->input('collection_id'),
        'status' => $request->input('collection_status'),
        'expired' => date(strtotime('today - '.$request->days.' days')),
        'plan_time' => $request->days.' dias',
      ]);

      // Assinatuaras::insert([
      //   'name' => md5(time()),
      //   'id_acompanhantes' => $request->acom,
      //   'id_anuncio' => $request->id,
      //   'expired' => date(strtotime('today - '.$request->days.' days')),
      //   'days' => $request->days.' dias',
      // ]);

      $html = '
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <div class="container mt-5 alert alert-warning" role="alert">
      <h4 class="alert-heading">Pedente!</h4>
        <p>Seu pagamento esta pedente, mas você ainda pode estar pagando ele pelo seu acesso.</p>
        <hr>
        <a href="https://sitesbr.online/acompanhantes/login" class="btn btn-secondary">Continuar</a>
      </div>
        ';


        echo $html;

    
      
    }
    
    public function notif()
    {

        $access_token =  MercadoPagoModel::first()->token_1 ?? MercadoPagoModel::first()->token_teste;


        MercadoPago\SDK::setAccessToken($access_token); 
        
        $preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();
    
        $colletion_id = "1312550474";
         
        $curl = curl_init();
            
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/'.$colletion_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer '.$access_token,
              'Content-Type: application/json'
            ),
        ));
      
        $payment_info = json_decode(curl_exec($curl), true);
      
        curl_close($curl);
      
        echo '<pre>';
        var_dump($payment_info);
    
    }


    public function pagamento($colletion_id)
    {

        $access_token =  MercadoPagoModel::first()->token_1 ?? MercadoPagoModel::first()->token_teste;


        MercadoPago\SDK::setAccessToken($access_token); 
        
        $preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();
    
         
        $curl = curl_init();
            
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/'.$colletion_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer '.$access_token,
              'Content-Type: application/json'
            ),
        ));
      
        $payment_info = json_decode(curl_exec($curl), true);
      
        curl_close($curl);
      
        echo '<pre>';
        // dd($payment_info);
         return redirect($payment_info['point_of_interaction']['transaction_data']['ticket_url']);
    
    }
    

    public function index()
    {
        $mercados = MercadoPagoModel::latest()->paginate(10);
        
        return view('adm.mercadopago',compact('mercados'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.mercadopago.create');
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
        
        MercadoPagoModel::create($request->all());
         
        return redirect()->route('adm.mercadopago')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(MercadoPagoModel $r)
    {

        $mercado = MercadoPagoModel::where('id', $request->id)->first();
        return view('adm.mercadopago.show',compact('mercado'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MercadoPagoModel $mercados, $id)
    {

      $mercado = MercadoPagoModel::where('id', $id)->first();

      return view('adm.mercadopago.edit',compact('mercado'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MercadoPagoModel $mercado, $id) 
    {
         

        $mercados = MercadoPagoModel::latest()->paginate(10);
         
        $mercado->where('id', $id)->update([
          'token_1' => $request->input('token_1'),
          'token_2' => $request->input('token_2'),
          'token_3' => $request->input('token_3'),
          'token_teste' => $request->input('token_teste'),
        ]);
        
        return view('adm.mercadopago',compact('mercados'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MercadoPagoModel $mercado): RedirectResponse
    {
        $mercado->delete();
         
        return view('adm.mercadopago');
    }

    public static function token(){

        $newtoken = MercadoPagoModel::first();

        $tokenw = $newtoken->token_1 ?? $newtoken->token_2;
        $token = empty($tokenw) ? $newtoken->token_teste  : null;

        return $token;
    }


    public static function tokenteste(){

        $newtoken = MercadoPagoModel::first();

        $token = $newtoken->token_teste;

        return $token;

    }

    public static function initial($email='', $metodo='', $descricao='', $card_token='', $valor='')
    {
        MercadoPago\SDK::setAccessToken(token());

        $payment = new MercadoPago\Payment();
        
        $payment->transaction_amount = $valor;
        $payment->token = $card_token;
        $payment->description = $descricao;
        $payment->installments = 1;
        $payment->payment_method_id = $metodo;//"visa";
        $payment->payer = array(
            "email" => $email
        );

        $payment->save();

        return $payment->status;
    }


    public static function initialTeste($email, $metodo, $descricao, $card_token, $valor)
    {
        
        MercadoPago\SDK::setAccessToken(tokenteste());

        $payment = new MercadoPago\Payment();
        
        $payment->transaction_amount = $valor;
        $payment->token = $card_token;
        $payment->description = $descricao;
        $payment->installments = 1;
        $payment->payment_method_id = $metodo;//"visa";
        $payment->payer = array(
            "email" => $email
        );

        $payment->save();

        return $payment->status;
    }

    public static function clientplan(){
        
        $config  = require_once 'signature/config.php';

        // DEFINIMOS AQUI O ID DO CLIENTE
        $customer_id = $config['customer_id'];

        // ACCESS TOKEN MERCADO PAGO
        $access_token = $config['access_token'];

        // DEFINIMOS AQUI O ID DO CARTAO (cartoes_do_cliente)
        $id_card_token = "8961121050";  ##########

        // DEFINIMOS AQUI O ID DO PLANO (planos_de_assinatura)
        $id_plan = isset($_GET['id_plan']) ? $_GET['id_plan'] : "2c93808483e8f4f2018400da3d8610e6";  ##########

        // DEFINIMOS AQUI O NOME DO PLANO (planos_de_assinatura)
        $name_plan = "Tutoria";  ##########

        // ACCESS TOKEN MERCADO PAGO
        $config       = require_once '../config.php';
        $access_token = $config['access_token'];

        // mude para true para ver toda a reposta do mercado pago
        $debug = true; ##########

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/preapproval',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "preapproval_plan_id": "'.$id_plan.'",
        "reason": "'.$name_plan.'",
        "external_reference": "YG-1234",
        "payer_email": "luanalvesnsr@gmail.com",
        "card_token_id": "'.$id_card_token.'",
        "back_url": "https://www.mercadopago.com.br",
        "status": "authorized"
        }',
        CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer '.$access_token
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);


        $obj = json_decode($response);

        if($debug){
        echo '<pre>';
        var_dump($obj);
        }else{

        echo $response;

        }

    }

    public static function assinaturas(){
        
    // ACCESS TOKEN MERCADO PAGO
    $config       = require_once 'signature/config.php';
    $access_token = $config['access_token'];

    // mude para true para ver toda a reposta do mercado pago
    $debug = false; ##########

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/preapproval_plan/search',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer '.$access_token
        ),
      ));

    $response = curl_exec($curl);
    curl_close($curl);

    $obj = json_decode($response);

    if($debug){
      echo '<pre>';
      var_dump($obj);
    }else{

      foreach ($obj->results as $key => $value) {

        if($value->auto_recurring->frequency_type == "months"){
          $label_m = "mes";
          if($value->auto_recurring->frequency>1){
            $label_m = "meses";
          }
        }

        echo '<div class="div_card" style="width: 400px;font-family: arial;-webkit-box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);border-radius: 13px;margin-left: 50px;margin-top: 50px;float: left;position: relative;min-height: 185px;max-height: 185px;" >
                <div class="div_title" style="background-color: #00beff;padding: 10px;color: #fff;overflow: hidden;" >Nome: <b>'.$value->reason.'</b> - Status: '.$value->status.'</div>
                <br />
                <div class="div_body" style="padding: 10px;" > '.$value->auto_recurring->frequency.'/'.$label_m.' | <b>R$ '.number_format($value->auto_recurring->transaction_amount,2,",",".").'</b></div>
                <br />
                <div class="div_footer" style="padding: 10px;background-color: #dbdbdb;" ><span>ID Plano: '.$value->id.'</span></div>
                <div style="cursor: pointer;text-align: center;padding-top: 5px;padding-bottom: 5px;background-color: #00beff;color: #fff;font-size: 24px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;" onclick="location.href=\'../salvar_cartao_cliente?id_plan='.$value->id.'\'" class="div_btn" >
                 Assinar
                </div>
              </div>';


      }
    }
    }


    public static function criarCliente(){
        if(!isset($_POST['email']) || !isset($_POST['nome']) || !isset($_POST['phone']) || !isset($_POST['documento']) || !isset($_POST['documento_number']) ){
            echo 'Preencha os campos';
            echo '<script>window.go(-1)</script>';
            die;
          }
        
          // ACCESS TOKEN MERCADO PAGO
          $config       = require_once 'signature/config.php';
          $access_token = $config['access_token'];
        
          $email                  = trim($_POST['email']);
          $first_name             = explode(' ',$_POST['nome'])[0];
          $last_name              = explode(' ',$_POST['nome'])[1];
          $identification_type    = trim($_POST['documento']);
          $identification_number  = trim($_POST['documento_number']);
          $phone                  = trim($_POST['phone']);
        
          $curl = curl_init();
        
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.mercadopago.com/v1/customers',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
            "email": "'.$email.'",
            "first_name": "'.$first_name.'",
            "last_name": "'.$last_name.'",
            "phone": {
              "area_code": "55",
              "number": "'.$phone.'"
            },
            "identification": {
              "type": "'.$identification_type.'",
              "number": "'.$identification_number.'"
            },
            "default_address": "Home",
            "address": {
              "id": "123123",
              "zip_code": "85930000",
              "street_name": "Rua teste",
              "street_number": 123
            },
            "date_registered": "2021-10-20T11:37:30.000-04:00",
            "description": "Description del user",
            "default_card": "None"
          }',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer '.$access_token,
              'Content-Type: application/json'
            ),
          ));
        
          $response = curl_exec($curl);
        
          curl_close($curl);
        
          $obj = json_decode($response);
        
          echo '<pre>';
          var_dump($obj);
        
    }
    


}
