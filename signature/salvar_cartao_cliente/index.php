<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Adicionar cartao</title>

    <!-- js ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- js mercado pago -->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

    <style media="screen">

      label{
        width: 95%;
      }

      input,select{
        width: 95%;
        height: 22px;
        margin-top: 5px;
        border-radius: 4px;
        border-color: #35baf6;
        font-size: 18px;
      }
    </style>

  </head>
  <body style="max-width: 500px;margin: 0 auto;background-color: #35baf6;">

    <form action="process.php?id_plan=<?php $id_plan = isset($_GET['id_plan']) ? $_GET['id_plan'] : "2c9380848243b8d7018244eaccda0042"; echo $id_plan; ?>" method="post" id="paymentForm" style="margin-top: 50px;background-color: #fff;padding: 5px;border-radius: 10px;font-family: arial;">
       <h3>Detalhe do comprador</h3>
         <div>
           <div>
             <label for="email">E-mail</label>
             <input id="email" name="email" type="text" value="test@test.com"/>
           </div>
           <div>
             <label for="docType">Tipo de documento</label>
             <select id="docType" name="docType" data-checkout="docType" type="text"></select>
           </div>
           <div>
             <label for="docNumber">Número do documento</label>
             <input id="docNumber" name="docNumber" data-checkout="docNumber" type="text"/>
           </div>
         </div>
       <h3>Detalhes do cartão</h3>
         <div>
           <div>
             <label for="cardholderName">Titular do cartão</label>
             <input id="cardholderName" data-checkout="cardholderName" type="text">
           </div>
           <div>
             <label for="">Data de vencimento</label>
             <div>
               <input value="11" type="text" placeholder="MM" id="cardExpirationMonth" data-checkout="cardExpirationMonth"
                 onselectstart="return false" onpaste="return false"
                 oncopy="return false" oncut="return false"
                 ondrag="return false" ondrop="return false" autocomplete=off>
               <span class="date-separator">/</span>
               <input value="25" type="text" placeholder="YY" id="cardExpirationYear" data-checkout="cardExpirationYear"
                 onselectstart="return false" onpaste="return false"
                 oncopy="return false" oncut="return false"
                 ondrag="return false" ondrop="return false" autocomplete=off>
             </div>
           </div>
           <div>
             <label for="cardNumber">Número do cartão</label>
             <input value="4235647728025682" type="text" id="cardNumber" data-checkout="cardNumber"
               onselectstart="return false" onpaste="return true"
               oncopy="return false" oncut="return false"
               ondrag="return false" ondrop="return false" autocomplete=off>
           </div>
           <div>
             <label for="securityCode">Código de segurança</label>
             <input value="123" id="securityCode" data-checkout="securityCode" type="text"
               onselectstart="return false" onpaste="return false"
               oncopy="return false" oncut="return false"
               ondrag="return false" ondrop="return false" autocomplete=off>
           </div>
           <div>
             <input type="hidden" name="transactionAmount" id="transactionAmount" value="100" />
             <input type="hidden" name="paymentMethodId" id="paymentMethodId" />
             <input type="hidden" name="description" id="description" />
             <br>
             <button type="submit" style="width: 95%;background-color: #35baf6;border: none;font-size: 30px;color: #fff;border-radius: 10px;">Salvar</button>
             <br>
           </div>
       </div>
     </form>

     <script type="text/javascript">
        window.Mercadopago.setPublishableKey("");

        $(function(){
            window.Mercadopago.getIdentificationTypes();

            document.getElementById('cardNumber').addEventListener('change', guessPaymentMethod);

              function guessPaymentMethod(event) {
                 let cardnumber = document.getElementById("cardNumber").value;
                 if (cardnumber.length >= 6) {
                     let bin = cardnumber.substring(0,6);
                     window.Mercadopago.getPaymentMethod({
                         "bin": bin
                     }, setPaymentMethod);
                 }
              };

              function setPaymentMethod(status, response) {
                 if (status == 200) {
                     let paymentMethod = response[0];
                     document.getElementById('paymentMethodId').value = paymentMethod.id;

                     getIssuers(paymentMethod.id);
                 } else {
                     alert(`payment method info error: ${response}`);
                 }
              }


              function getIssuers(paymentMethodId) {
                 window.Mercadopago.getIssuers(
                     paymentMethodId,
                     setIssuers
                 );
              }

              function setIssuers(status, response) {
                 if (status == 200) {
                     let issuerSelect = document.getElementById('issuer');
                     response.forEach( issuer => {
                         let opt = document.createElement('option');
                         opt.text = issuer.name;
                         opt.value = issuer.id;
                         issuerSelect.appendChild(opt);
                     });

                     getInstallments(
                         document.getElementById('paymentMethodId').value,
                         document.getElementById('transactionAmount').value,
                         issuerSelect.value
                     );
                 } else {
                     alert(`issuers method info error: ${response}`);
                 }
              }

                function getInstallments(paymentMethodId, transactionAmount, issuerId){
                     window.Mercadopago.getInstallments({
                         "payment_method_id": paymentMethodId,
                         "amount": parseFloat(transactionAmount),
                         "issuer_id": parseInt(issuerId)
                     }, setInstallments);
                  }

                  function setInstallments(status, response){
                     if (status == 200) {
                         document.getElementById('installments').options.length = 0;
                         response[0].payer_costs.forEach( payerCost => {
                             let opt = document.createElement('option');
                             opt.text = payerCost.recommended_message;
                             opt.value = payerCost.installments;
                             document.getElementById('installments').appendChild(opt);
                         });
                     } else {
                         alert(`installments method info error: ${response}`);
                     }
                  }


                  doSubmit = false;
                    document.getElementById('paymentForm').addEventListener('submit', getCardToken);
                    function getCardToken(event){
                       event.preventDefault();
                       if(!doSubmit){
                           let $form = document.getElementById('paymentForm');
                           window.Mercadopago.createToken($form, setCardTokenAndPay);
                           return false;
                       }
                    };

                    function setCardTokenAndPay(status, response) {
                       if (status == 200 || status == 201) {
                           let form = document.getElementById('paymentForm');
                           let card = document.createElement('input');
                           card.setAttribute('name', 'token');
                           card.setAttribute('type', 'hidden');
                           card.setAttribute('value', response.id);
                           form.appendChild(card);
                           doSubmit=true;
                           form.submit();
                       } else {
                           alert("Verify filled data!\n"+JSON.stringify(response, null, 4));
                       }
                    };


        });


     </script>

  </body>
</html>
