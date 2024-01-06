<x-layoutMain :avatar="$setting->imageAvatar" :nomPrenom="$setting->nomPrenom" pageActuel="param">
<section class="theme">
    <form class="max-w-lg mx-auto" action="{{Route("param.update")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label class="field-border" for="imageAccueil">Charger un fichier pour l'accueil</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="imageAccueil" name="imageAccueil" type="file">
        </div>

        <div class="mb-5">
            <label class="field-border" for="imageAvatar">Charger un fichier pour l'avatar</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  id="imageAvatar" name="imageAvatar" type="file">
        </div>

        <div class="mb-5">
            <label for="jobRechercher" class="field-border">Le nom du job</label>
            <input type="text" id="jobRechercher" name="jobRechercher" class="field" value="{{$setting->jobRechercher}}" required>
        </div>

        <div class="mb-5">
            <label for="jobRechercher2" class="field-border">Le nom du job</label>
            <input type="text" id="jobRechercher2" name="jobRechercher2" class="field" value="{{$setting->jobRechercher2}}" required>
        </div>

        <div class="mb-5">
            <label for="nomPrenom" class="field-border">Le nom du job</label>
            <input type="text" id="nomPrenom" name="nomPrenom" class="field" value="{{$setting->nomPrenom}}" required>
        </div>

        <input type="submit" value="modifier" class="button"/>
    </form>
</section>
</x-layoutMain>