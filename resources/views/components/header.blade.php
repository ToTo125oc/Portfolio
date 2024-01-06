<div class="theme">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="{{Route('index')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{Storage::url($avatar)}}" class="h-8" alt="MonLogo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap title">{{$nomPrenom}}</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class=" theme-nav">
        <li>
          <a href="{{Route("competences.index")}}" @if($pageActuel=="competences") class="nav-select" aria-current="page" @else class="nav-no-select" @endif >Compétences</a>
        </li>
        <li>
          <a href="{{Route("projets.index")}}" @if($pageActuel=='projets') class="nav-select" aria-current="page" @else class="nav-no-select" @endif>Projets</a>
        </li>
        <li>
          <a href="{{Route("contact.index")}}" @if($pageActuel=='contact') class="nav-select" aria-current="page" @else class="nav-no-select" @endif>Contact</a>
        </li>
        @auth
        <li>  
          <a href="{{Route("param")}}" @if($pageActuel=='param') class="nav-select" aria-current="page" @else class="nav-no-select" @endif>Paramêtres</a>
        </li>
        <li>
          <button id="theme-toggle" type="button" class="button">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
          </button>
        </li>
        <li>  
          <form action="{{ route('logout') }}" method="POST" class="nav-deco">
            @csrf
            <input type="submit" value="Déconnexion"/>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</div>

