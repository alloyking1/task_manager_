
{{-- <x-elements.section color="bg-blue-500" size="24">
    
</x-elements.section> --}}
<div class="grid" x-data={show:false}>
    
    <div class="grid grid-cols-1 gap-2">
        <div class="flex justify-between mt-10">
    
            <h3 class="text-3xl font-bold mb-4">Projects</h3>
            <span x-on:click="show = !show">
                <x-elements.round-button text="+" />
            </span>
        </div>
        <hr>

        @forelse ($projects as $project )
            <x-elements.card class="bg-white p-6 mt-6">
                <div class="flex gap-4 justify-between">
                    <div class="flex gap-6">
                        <p>{{ $project->name }}</p>
                        <div class="flex">
                            <x-elements.round-button text="+"/>
                            <x-elements.round-button text="+"/>
                            <x-elements.round-button text="+"/>
                        </div>
                    </div>
                    <div class="">
                        <button class="text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </button>
                        <button class="text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </div>
                    
                </div>
            </x-elements.card>
        @empty
            <p>No projects</p>
        @endforelse

        
    </div>

    <div 
    class="bg-gray-300 shadow-sm rounded-l-md col-span-2 top-0 bottom-0 right-0 w-full md:w-1/2 fixed p-8"
     x-show="show"
     x-transition
     {{-- x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90" --}}
    >
        <div class="grid mx-auto w-auto place-contents-center">
            <div class="flex justify-between">
        
                <h3 class="text-3xl font-bold mb-4">New Projects</h3>
                <span x-on:click="show = !show">
                    <x-elements.round-button text="x"/>
                </span>
            </div>

            <div class="mt-[10%]">
                <form wire:submit="create">
                    <div>
                        
                        <x-text-input wire:model.live="name" class="block mt-1 w-full" type="text" placeholder="Project name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        
                        <x-text-input wire:model.live="description" class="block mt-1 w-full" type="text" placeholder="Project description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- <div class="mt-4">
                    
                        <select multiple wire:model="invites">
                            <option value="testing">testing</option>
                            <option value="testing">refresh</option>
                            <option value="testing">working</option>
                        </select>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div> --}}
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-3">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
