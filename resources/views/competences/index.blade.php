<x-layoutMain :avatar="$setting->imageAvatar" :nomPrenom="$setting->nomPrenom" pageActuel=competences>
    @if(!empty($competences))
        <div class="grid grid-cols-3 place-items-center max-w-screen-xl mx-auto p-4">
            @foreach($competences as $competence)
                <div class="m-5 flex flex-col relative group" data-popover-target="popover-competence-{{$competence->id}}">
                    <div class="aspect-square max-h-80 group-hover:opacity-90 transition-opacity duration-300">
                        <img class="rounded-lg object-cover h-full w-full"  src="{{Storage::url($competence->imageCompetence)}}" alt="Pas d'image"/>
                    </div>
                    <h2 class="text-center theme-text">{{$competence->nom}}</h2>
                    @auth
                        <div class="flex flex-row">
                            <x-delete-item route="competences.destroy" :item="$competence->id" />
                        </div>
                    @endauth
                    <div data-popover id="popover-competence-{{$competence->id}}" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 theme border border-gray-200 rounded-lg shadow-sm opacity-0 w-72  dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold theme-text">Description de la compétence</h3>
                            <p>{{$competence->description}}</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
            @endforeach
            @auth
                <div class="m-5 flex flex-col ">
                    <x-form-competence route="competences.store" :modif=false :competence="null"/>
                </div>
            @endauth
        </div>
    @else
        <p>Pas de compétences</p>
    @endif
</x-layoutMain>
