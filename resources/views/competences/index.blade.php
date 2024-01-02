<x-layoutMain>
    @if(!empty($competences))
    <div class="grid grid-cols-3 place-items-center max-w-screen-xl mx-auto p-4">
        @foreach($competences as $competence)
            <div class="m-5 flex flex-col ">
                <div class="aspect-square  max-h-80">
                    <img class="rounded-lg object-cover h-full w-full"  src="{{Storage::url($competence->imageCompetence)}}" alt="Pas d'image"/>
                </div>
                <h2 class="text-center">{{$competence->nom}}</h2>
                @auth
                <div class="flex flex-row">
                    <x-delete-item route="competences.destroy" :item="$competence->id" />
                    <x-form-competence route="competences.update" :modif=true :competence="$competence"/>
                </div>
                @endauth
            </div>
        @endforeach
        @auth
            <div class="m-5 flex flex-col ">
            <x-form-competence route="competences.store" :modif=false :competence="null"/>
            </div>
        @endauth
    </div>
    @else
        <p>Pas de competences</p>
    @endif
</x-layoutMain>