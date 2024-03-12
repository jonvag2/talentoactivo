<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- arreglando develop --}}
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- <style>
            .imagenjon{
                background-image: url("{{asset('storage/posts2/4.png')}}");
                height: 400px;
                width: 400px;
                margin-left: auto;
                margin-right: auto;s
            }
        </style> --}}
        <style>
        .cortar-caracter1{
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 1;/* el maximo de lineas que e mostrara */
            -webkit-box-orient: vertical;
          }
        </style>
        <style>
            .cortar-caracter2{
                display: -webkit-box;
                overflow: hidden;
                -webkit-line-clamp: 5;/* el maximo de lineas que e mostrara */
                -webkit-box-orient: vertical;
              }
            </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation'){{-- esta es la manera de llamar a un componente de livewire, que esta ubicado en /views/livewire --}}

        

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
