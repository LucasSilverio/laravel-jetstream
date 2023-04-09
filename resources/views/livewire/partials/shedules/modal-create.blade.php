<x-modal wire:model="showModalEvent" maxWidth="2xl">
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900">
            Adicionar novo evento
        </div>

        <div class="mt-4 text-sm text-gray-600">
            <form method="POST" wire:submit.prevent="createEvent" autocomplete="false">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Título
                      </label>
                      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Defina um título ou deixe em branco" wire:model="title" name="title">
                      @error('title')
                        {{ $message }}
                      @enderror
                    </div>
                </div>

                @if($client_id == '')
                    @livewire('contact-search-bar', ['client_id' => $client_id])
                    @error('client_id')
                        <p class="-mt-8 mb-3">Necessário informar o paciente</p>
                    @enderror
                @else
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Paciente
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" wire:model="client_name" disabled>
                        </div>
                    </div>
                @endif

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-inicial">Hora Inicial</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-inicial" type="datetime-local" wire:model="start">
                        @error('start')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-final">Hora Final</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-inicial" type="datetime-local" wire:model="end">
                        @error('end')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label for="">Descrição</label>
                        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" wire:model="description"></textarea>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        @if($event_id != "")
                            @if ($this->confirmDelete == $this->event_id)
                                <a href="javascript:;" wire:click="delete" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Tem certeza?</a>
                            @else
                                <a href="javascript:;" wire:click="confirmDelete" class="inline-flex items-center px-4 py-2 bg-orange-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Excluir</a>
                            @endif
                        @endif
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">
                            Salvar
                        </button>
                    </div>
                </div>
              </form>
        </div>
    </div>
</x-modal>
