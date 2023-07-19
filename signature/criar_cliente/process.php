<?php

  if(!isset($_POST['email']) || !isset($_POST['nome']) || !isset($_POST['phone']) || !isset($_POST['documento']) || !isset($_POST['documento_number']) ){
    echo 'Preencha os campos';
    echo '<script>window.go(-1)</script>';
    die;
  }

  // ACCESS TOKEN MERCADO PAGO
  $config       = require_once '../config.php';
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
