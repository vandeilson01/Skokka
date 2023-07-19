<?php

    // ACCESS TOKEN MERCADO PAGO
    $config       = require_once '../config.php';
    $access_token = $config['access_token'];

    // mude para true para ver toda a reposta do mercado pago
    $debug = false; ##########

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.mercadopago.com/preapproval/search',
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

        echo '<div class="div_card" style="width: 500px;font-family: arial;-webkit-box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);box-shadow: 1px 3px 21px 3px rgba(0,0,0,0.62);padding: 10px;border-radius: 13px;margin-left: 50px;margin-top: 50px;float: left;position: relative;" >
                <div class="div_title" >Nome: <b>'.$value->reason.'</b> - Status: '.$value->status.'</div>
                <br />';
        if($value->status != "PREPARED_FOR_DELETE"){
          echo '<div class="div_body" > '.$value->auto_recurring->frequency.'/'.$value->auto_recurring->frequency_type.' | <b>R$ '.$value->auto_recurring->transaction_amount.'</b></div>
                <br />';
        }

      echo '<div class="div_footer" ><b>Nome pagador:</b> '.$value->payer_first_name.$value->payer_last_name.'</div>';
      echo '<br /><div class="div_footer" ><b>ID Assinatura:</b> '.$value->id.'</div></div>';


      }




    }
