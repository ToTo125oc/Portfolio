<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body class="theme">
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <nav><x-header :avatar="$avatar" :nomPrenom="$nomPrenom" :pageActuel="$pageActuel"></x-header></nav>
    <main>{{$slot}}</main>
    <x-rgpd-banner></x-rgpd-banner>
    <footer><x-footer></x-footer></footer>
</body>
</html>