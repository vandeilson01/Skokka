<?php
 

  // ACCESS TOKEN MERCADO PAGO
  $config       = require_once '../config.php';
  $access_token = $config['access_token'];

  $email = trim("vandeilson.of@gmail.com");
  


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
