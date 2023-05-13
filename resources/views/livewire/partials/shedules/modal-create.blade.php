<x-modal wire:model="showModalEvent" maxWidth="6xl">
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

                @if(1 == 1)
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
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-inicial" type="datetime-local" wire:model="start" {{$method != '' ? 'disabled' : ''}}>
                        @error('start')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-final">Hora Final</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-inicial" type="datetime-local" wire:model="end" {{$method != '' ? 'disabled' : ''}}>
                        @error('end')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label for="">Descrição</label>
                        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" wire:model="description"  {{$finance != null ? 'disabled' : ''}}></textarea>
                    </div>
                </div>
                @if($event_id != '')
                    <div class="flex flex-wrap -mx-3 mb-6 border-t-teal-600">
                        <div class="flex w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <svg
                                class="h-6 w-6 text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z"
                                />
                            </svg>
                            Financeiro
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-inicial">Valor</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-inicial" type="text" wire:model="valor" {{$finance != null ? 'disabled' : ''}}>
                            @error('valor')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-inicial">Forma de Pagamento</label>
                            <select wire:model="method" {{$finance != null ? 'disabled' : ''}}    >
                                <option value="">Selecione</option>
                                @foreach($methods as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex">
                        <svg
                                class="h-6 w-6 text-emerald-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        Pagamento realizado. Acesse o menu Financeiro para maiores detalhes.
                    </div>
                @endif
                @if($finance == null)
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
                @endif
              </form>
        </div>
    </div>
</x-modal>
