<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Alive</title>

    @vite(['Modules/Alive/Resources/js/alive.js', 'Modules/Alive/Resources/css/alive.css'])

</head>

<body class="bg-gray-200">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white border p-5 w-1/2 rounded-xl drop-shadow-lg">
            <h1 class="text-xl mb-4 font-bold text-gray-700">Welcome to The Alive Module</h1>
            <p class="mb-4">
                Create an extraordinary module, launch your module to the public for free or for a fee to be reused in
                the <a class="underline" href="https://github.com/hexters/laramodule"
                    target="_blank">hexters/laramodule</a> package by executing the command below
            </p>
            <p class="mb-4 bg-gray-200 p-5">
                <code>
                    php artisan module:publish Alive
                </code>
            </p>
            <p class="mb-4">
                If you want to sell it, you can use an alternative PHP package license sales Saas website at
                <a href="https://ppmarket.org" target="_blank" class="underline">https://ppmarket.org</a>.
            </p>
            <h3 class="text-lg font-bold mb-4">Donate</h3>
            <p>
                If this Laravel package was useful to you, please consider donating to development <a href="https://www.patreon.com/hexters" target="_blank" class="font-bold underline">Patreon</a>
            </p>
        </div>
    </div>

</body>

</html>
