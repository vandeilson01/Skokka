<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="{{url('adm/img/favicon.ico')}}" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="{{url('adm/img/apple-icon.png')}}"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <link
      rel="stylesheet"
      href="{{url('adm/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
    />

    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/instagram.css' rel='stylesheet'>
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/twitter.css' rel='stylesheet'>
        
    <link rel="stylesheet" href="{{url('adm/styles/tailwind.css')}}" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    {{ $slot }}
  </body>

  <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      charset="utf-8"
    ></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="{{url('adm/script.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
     
    <script>
 

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

      
  $('.delete').click(function(event) {
          var form =  $(this).closest("form");
          event.preventDefault();
          swal({
              title: `Deleta`,
              text: "Deseja mesmo deletar esse item?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
</html>

