<?php
    $config       = require_once '../config.php';

    // DEFINIMOS AQUI O ID DO CLIENTE
    $customer_id = $config['customer_id'];

    // ACCESS TOKEN MERCADO PAGO
    $access_token = $config['access_token'];

    // mude para true para ver toda a reposta do mercado pago
    $debug = false; ##########

      // verificar se existe token do cartao
    if(isset($_POST['token'])){

      // recupera o token do cartao
      $token = trim($_POST['token']);

      // recupera o numero do documento do Titular
      $docNumber = trim($_POST['docNumber']);

      // recupear o tipo de documento
      $docType = trim($_POST['docType']);

      // metodo de pagamento id
      $paymentMethodId = trim($_POST['paymentMethodId']);

      // DEFINIMOS AQUI O ID DO PLANO (planos_de_assinatura)
      $id_plan = isset($_GET['id_plan']) ? $_GET['id_plan'] : "2c93808483e8f4f2018400da3d8610e6";  ##########

      // DEFINIMOS AQUI O NOME DO PLANO (planos_de_assinatura)
      $name_plan = isset($_GET['name_plan']) ? $_GET['name_plan'] : "Yoga classes";  ##########


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
      "payer_email": "emaildealguem@gmail.com",
      "card_token_id": "'.$token.'",
      "back_url": "https://www.mercadopago.com.br",
      "status": "authorized"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer '.$access_token
      ),
      ));

      $response1 = curl_exec($curl);
      curl_close($curl);

      // VAMOS AGORA SALVAR O CARTÃO PARA O USUARIO CUJO ID ESTÁ ACIMA
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/v1/customers/'.$customer_id.'/cards',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "token": "'.$token.'"
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
        echo '<script>location.href="../cartoes_do_cliente";</script>';
      }

    }



?>
