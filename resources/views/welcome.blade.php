<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

         @vite( "resources/css/app.css", "resources/scss/app.scss", "resources/js/app.js",)
    </head>
   <body class="container mx-auto mt-10">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Product Page - Resuable component</h1>
        <button>
            <a href="{{ route('product.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-3xl">
                Product table
            </a>
        </button>
    </div>


    <div class="grid grid-cols-4 gap-4 mt-10">

        @foreach ($products as $product)

        <x-product-card :product="$product"/>
        @endforeach
    </div>
   </body>
</html>
