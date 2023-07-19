<?php

    $config       = require_once '../config.php';

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
