<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/instagram.css' rel='stylesheet'>
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/twitter.css' rel='stylesheet'>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            #myBtn{
                position: fixed;
                right: 1%;
                bottom: 1%;
                background: #000000;
                color: #ffffff;
                border-left: 10px solid #000000;
                border-right: 10px solid #000000;
                border-radius: 10%;
            }
            #myBtn:before{
                content: '^';
                text-indent: 2%;
                width: 50px;
                font-size:  25px;
                height: 50px;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="container mx-auto flex flex-col space-y-2 mt-5">
                {{ $slot }}
            </main>
        </div>
    </body>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>

    $('#cep').on('blur', function(){
    
    if($.trim($("#cep").val()) != ""){

      $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){

          if(resultadoCEP["resultado"]){
          $("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
          $("#distrito").val(unescape(resultadoCEP["bairro"]));
          $("#cidade").val(unescape(resultadoCEP["cidade"]));
          $("#uf").val(unescape(resultadoCEP["uf"]));
        }

        $("#mensagem").html('');
      });				
    }			
    });

        $(document).ready(function () {

            $('#state').on('change', function () {
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">-- Selecionar Cidade --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            })
            
  
            
        });
    
    
  // Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}




// function valide(){

// }

$('.page-next').on('click', function() {
  var elem = $('div[class="grid"]');
  if(!elem.hasClass('anuncios-page')){
    alert('anuncios');  
  }
  });
  $('.page-next').on('click', function() {
  var elem = $('div[class="grid"]');
  if(!elem.hasClass('fotos-page')){
    alert('fotos');  
  }
});

$('.page-next').on('click', function() {

  var elem = $('div[class="grid"]');
  if(!elem.hasClass('visibilidade-page')){
    alert('visibilidade');  
  }
});

$('.page-next').on('click', function() {

  var elem = $('div[class="grid"]');
  if(!elem.hasClass('email-page')){
    alert('email');  
  }
  });
// });




$('.delete').on('click', function() {
 
  Swal.fire({
    title: 'Deseja Deletar esse item',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'SIM',
    cancelButtonText: 'NÃO',
  }).then((result) => {
    if (result.isConfirmed) {

      $(this).submit();

      Swal.fire(
        'Deletado!',
        'Item deletado com sucesso.',
        'success'
      )
    }
  })

});



$('.cadastro').on('click', function() {

  if($('#endereco').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Endereço ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 

  if($('#postal').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo CEP ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 


  if($('#ditrito').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Área/distrito/bairro ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 

  if($('#idade').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Idade ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 


  if($('#endereco').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Endereço ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 

  if($('#titulo_anuncio').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Titulo do Anúncio ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 


  if($('#texto').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Texto do Anúncio ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 

  if($('#email').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Email ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 

  if($('#Numero de Telefone').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Endereço ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 

  if($('#pass_i').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Preencha o campo Senha ',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 


  if($('#pass_t').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Confirme a sua senha',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 


  if($('[name="e_termos"]').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Aceite os termos e condições',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 


  if($('[name="e_fotos"]').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Confirme sua fotos',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 


  // if($('[name="files[]"]').attr('value') == null){
  //   Swal.fire({
  //     icon: 'error',
  //     title: 'Ops...',
  //     text: 'Escolha suas fotos',
  //     // footer: '<a href="">Why do I have this issue?</a>'
  //   })

  // } 

  if($('[name="plan"]').attr('value') == null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: 'Escolha um plano',
      // footer: '<a href="">Why do I have this issue?</a>'
    })

  } 
 

});

  </script>
</html>
