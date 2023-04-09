<div class="flex flex-wrap -mx-3 mb-6 relative">
    <div class="w-full px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Paciente
      </label>
      <input autocomplete="off" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Informe o nome do paciente" wire:model="query" >
      <input type="hidden" wire:model="client_id" name="client_id" />
      @if(!empty($contacts))
        <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
            <ul>
                @foreach($contacts as $contact)
                    <li class="list-none my-4">
                        <a href="javascript:;" class="hover:text-sky-600" wire:click="selectContact({{ $contact['id'] }})">{{ $contact['firstname'] . ' ' .$contact['lastname'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
      @endif
    </div>
</div>
