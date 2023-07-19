<?php
    $config       = require_once '../config.php';

    // DEFINIMOS AQUI O ID DO CLIENTE
    $customer_id = $config['customer_id'];

    // ACCESS TOKEN MERCADO PAGO
    $access_token = $config['access_token'];

    // mude para true para ver toda a reposta do mercado pago
    $debug = false; ##########

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.mercadopago.com/v1/customers/'.$customer_id.'/cards',
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

      foreach ($obj as $key => $value) {

        echo '<div class="div_card" style="width: 300px;font-family: arial;-webkit-box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);padding: 10px;border-radius: 13px;margin-left: 50px;margin-top: 50px;" >
                <div class="div_title" >'.$value->issuer->name.'</div>
                <br />
                <div class="div_body" > <img src="'.$value->payment_method->thumbnail.'" />  ****'.$value->last_four_digits.'</div>
                <br />
                <div class="div_footer" >ID Card Token: '.$value->id.'</div>
             </div>';


      }




    }
