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
                            @forelse($table->task  as $task )
                            <div class="bg-white p-6 mt-6 w-auto rounded border">
                                {{ $task->name }}
                            </div>

                            {{-- @if ($loop->last)
                                @php $this->tableId = $table->id @endphp
                                <x-elements.add-task-form taskName="taskName" tableId="tableId" tableIdValue="{{ $table->id }}" wireSubmitMethodName="createTask" />
                            @endif --}}

                            @empty
                            {{-- @php $this->tableId = $table->id @endphp --}}
                            {{-- <x-elements.add-task-form taskName="taskName" tableId="tableId" tableIdValue="{{ $table->id }}" wireSubmitMethodName="createTask" /> --}}
                            
                            @endforelse
                        </div>

                        
                        @php 
                            $this->tableKey[$loop->index] = $loop->iteration;
                            // $this->tableId = $this->tableKey[$loop->index]
                        @endphp
                        <input type="text" value="{{ $loop->iteration }}">
                        {{-- <input type="text" wire:model="taskName">
                        <input type="text" wire:model="{{ $this->tableKey[$loop->index] }}"> --}}
                        {{-- {{ $this->tableKey[$loop->index] }} --}}



                        <form wire:submit.prevent="createTask">
                            <input type="text" wire:model="taskName">
                            <input type="text" wire:model="tableId">
                                <x-primary-button class="ml-3 mr-2">
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-elements.card>
                @endforeach
            </div>
        @endforeach
    </div>
</div>