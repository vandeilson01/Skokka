<?php

    // ACCESS TOKEN MERCADO PAGO
    $config       = require_once '../config.php';
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
