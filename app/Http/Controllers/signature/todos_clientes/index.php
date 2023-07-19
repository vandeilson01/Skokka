<?php

    // ACCESS TOKEN MERCADO PAGO
    $config       = require_once '../config.php';
    $access_token = $config['access_token'];

    // mude para true para ver toda a reposta do mercado pago
    $debug = false; ##########

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.mercadopago.com/v1/customers/search',
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

        echo '<div class="div_card" style="width: 500px;font-family: arial;-webkit-box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);padding: 10px;border-radius: 13px;margin-left: 50px;margin-top: 50px;" >
                <div class="div_title" ><b>Nome:</b> '.$value->first_name.' '.$value->last_name .' - <b>'.$value->identification->type.'</b>: '.substr($value->identification->number,0,2).'*********** </div>
                <br />
                <div class="div_body" > <b>Email:</b> '.$value->email.' - <b>Telefone:</b> '.$value->phone->area_code.$value->phone->number.'</div>
                <br />
                <div class="div_footer" ><b>ID Cliente:</b> '.$value->id.'</div>
             </div>';


      }




    }
