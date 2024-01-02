<x-layoutMain>
    @if($projet)
    <div class="flex flex-wrap place-items-center max-w-screen-xl mx-auto p-4">
            <div class="m-5 flex flex-col w-full">
                <div class="w-full">
                     <img src="{{Storage::url($projet->imageProjet)}}" alt="Pas d'image" class="rounded-lg object-cover md:h-23 h-80 w-full"/>
                </div>
                <div class="">
                    <h2 class="text-4xl font-bold dark:text-black">{{$projet->titre}}</h2>
                    <div>{!! $parsedown->text($projet->contenu) !!}</div>
                </div>
                @auth
                <div class="flex flex-row">
                    <x-form-projet route="projets.update" :modif=true :projet="$projet"/>
                </div>
                @endauth
            </div>
            @else
            <p>Pas de projet</p>
            @endif
    </div>
    
</x-layoutMain>