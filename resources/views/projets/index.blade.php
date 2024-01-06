<x-layoutMain :avatar="$setting->imageAvatar" :nomPrenom="$setting->nomPrenom" pageActuel="projets">
    @if(!empty($projets))
    <div class="flex flex-wrap place-items-center max-w-screen-xl mx-auto p-4">
            @for($i = 0; $i < count($projets); $i++)
            <div class="m-5 flex flex-col w-full @if($i % 2 == 0) projet-1 @else projet-2 @endif group">
                <div class="@if($i % 2 == 0) projet-hover-1 @else projet-hover-2 @endif group-hover:bg-opacity-0">
                <a href="{{Route('projets.show', $projets[$i]->id)}}" class="m-5 flex @if($i % 2 == 0) md:flex-row-reverse @else md:flex-row @endif flex-col" w-full>
                    <div class="md:flex-shrink-0 md:w-2/3">
                        <img src="{{Storage::url($projets[$i]->imageProjet)}}" alt="Pas d'image" class="rounded-lg object-cover w-full h-60"/>
                    </div>
                    <div class="flex flex-col md:flex-shrink-0 m-4 md:w-1/3 @if($i % 2 == 0) md:text-end @else md:text-start @endif text-center">
                        <h2 class="text-4xl font-bold dark:text-white">{{$projets[$i]->titre}}</h2>
                        <p>{{$projets[$i]->resume}}</p>
                    </div>
                </a>
                @auth
                <div class="flex flex-row">
                    <x-delete-item route="projets.destroy" :item="$projets[$i]->id" />
                </div>
                @endauth
                </div>
            </div>
        @endfor
        @auth
            <div class="m-5 flex flex-col ">
            <x-form-projet route="projets.store" :modif=false :projet="null"/>
            </div>
        @endauth
    </div>
        
    @else
        <p>Pas de projet</p>
    @endif
</x-layoutMain>