<x-modal wire:model="showModal" maxWidth="2xl">
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900">
            Adicionar novo evento
        </div>

        <div class="mt-4 text-sm text-gray-600">
            <form method="post" class="w-full max-w-lg" wire:submit.prevent="create">
                                        
               
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">
                            Salvar
                        </button>
                    </div>
                </div>
              </form>
        </div>
    </div>
</x-modal>