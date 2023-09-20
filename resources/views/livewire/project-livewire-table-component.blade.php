<div class="grid" x-data={show:false}>
    
    <div class="grid grid-cols-1 gap-2">
        @foreach ($projects as $project)
            <x-elements.justify-between class="mt-10">
                
                <h3 class="text-3xl font-bold mb-4">{{ $project->name }}</h3>
                <span x-on:click="show = !show">
                    <x-elements.round-button text="+"/>
                </span>
            </x-elements.justify-between>
            <hr>
            <div class="flex gap-2 overflow-x-hidden">
                @foreach ($project->tables as $table )
                    <x-elements.card class="bg-white p-6 mt-6 w-[25%]">
                        <div class="flex justify-between">

                            {{$table->name}}
                            <span x-on:click="show = !show">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                  </svg>                                  
                                  
                            </span>
                        </div>
                        <hr>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach ($table->task  as $task )
                            <div class="bg-white p-6 mt-6 w-auto rounded border">
                                {{ $task->name }}
                            </div>

                            {{-- <div x-data{show:false} id="{{ now() }}">
                                <form wire:submit.prevent="create" x-show="show">
                                    <div>
                                        <x-text-input wire:model.live="name" class="block mt-1 w-full" type="text" placeholder="Little about the task" />
                                        <x-text-input wire:model.live="taskId" value="{{ $task->id }}" type="hidden" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                            
                                    <div class="flex items-center justify-end mt-4">
                                        
                                        <x-primary-button class="ml-3 mr-2">
                                            {{ __('Create') }}
                                        </x-primary-button>
                                        <span @click="show=false">X</span>
                                    </div>
                                </form>
                                <button @click="show = true" x-show="show==false">Add task</button>
                            </div> --}}
                            @endforeach
                        </div>
                    </x-elements.card>
                @endforeach
            </div>
        @endforeach
        
    </div>
</div>