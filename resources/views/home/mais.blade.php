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
            </main>
        </div>
    </body>

  
    <!-- <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>    
        const mp = new MercadoPago('YOUR_PUBLIC_KEY');
    </script> -->
</html>
