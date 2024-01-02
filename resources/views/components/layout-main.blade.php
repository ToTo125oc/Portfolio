<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body>
    <nav><x-header></x-header></nav>
    <main>{{$slot}}</main>
    <footer><x-footer></x-footer></footer>
</body>
</html>