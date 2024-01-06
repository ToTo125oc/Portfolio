<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Thomas</title>
    <link rel="shortcut icon" href="{{Storage::url($setting->imageAvatar)}}" />
    @vite(['resources/js/app.js','resources/css/app.css','resources/css/accueilAnim.css'])
</head>
<script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
</script>
<body class="bg-center bg-no-repeat bg-cover theme bg-blend-multiply" style="background-image: url({{Storage::url($setting->imageAccueil)}});">
<div class="flex flex-col items-center bg-gray-800 p-5 rounded-lg">
<div class="wrapper text-lg">
    <div class="text-4xl md:text-6xl text-white mt-4 ">Je suis</div>
    <ul class="dynamic-txts hidden md:block">
      <li><span class="title">{{$setting->jobRechercher}}</span></li>
      <li><span class="title">{{$setting->jobRechercher2}}</span></li>
      <li><span class="title">{{$setting->nomPrenom}}</span></li>
      <li><span class="title">{{$setting->jobRechercher}}</span></li>
    </ul>
    <span class="title text-4xl mt-4 ml-3 block md:hidden">{{$setting->nomPrenom}}</span>
  </div>
  <div class="flex flex-row">
  <div class="mt-5">
    <a href="{{Route('competences.index')}}" class="button">Accéder au portfolio</a>
    </div>
        <button id="theme-toggle" type="button" class="button mt-3">
        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
    </button>
    </div>
</div>
</body>
</html>