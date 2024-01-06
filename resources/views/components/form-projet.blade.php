<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block button" type="button">
            +
        </button>

<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative theme">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Ajouter un projet
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{Route("projets.store")}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="titre" class="field-border">Le nom</label>
                        <input type="titre" name="titre" id="titre" class="field" placeholder="nom" required>
                    </div>
                    <div class="my-2">
                        <label for="resume" class="field-border">resumé</label>
                        <textarea class="field" id="resume" name="resume" placeholder="resume"></textarea>
                    </div>
                    
                    <div class="my-2" >
                        <label for="contenu" class="field-border">description du projet en markdown</label>
                        <textarea class="field" id="contenu" name="contenu" placeholder="contenu"></textarea>
                    </div>
                    <div class="my-2" >
                        <label class="block mb-2 text-sm font-medium field-border" for="imageProjet">Charger un fichier</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="imageProjet" name="imageProjet" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                    <button type="submit" class="w-full button">Créer projet</button>
                </form>
            </div>
        </div>
    </div>
</div> 