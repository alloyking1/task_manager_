
<div class="grid" x-data={show:false}>
    
    <div class="grid grid-cols-1 gap-2">
        <x-elements.justify-between class="mt-10">
            
            <h3 class="text-3xl font-bold mb-4">Projects</h3>
            <span x-on:click="show = !show">
                <x-elements.round-button text="+"/>
            </span>
        </x-elements.justify-between>
        <hr>

        @forelse ($projects as $project )
            <a wire:click.prevent="show({{ $project->id }})" class="cursor-pointer">
                <x-elements.card class="bg-white p-6 mt-6">
                    <x-elements.task-content :name="$project->name" :members="[]">
                        <x-btn.edit x-on:click="show = !show" wire:click="edit({{ $project->id }})"/>
                        <x-btn.delete wire:click="delete({{ $project->id }})"/>
                    </x-elements.task-content>
                </x-elements.card>
            </a>
        @empty
            <p>No projects</p>
        @endforelse

        
    </div>

   <x-elements.side-modal>
    <form wire:submit.prevent="create">
        <div>
            <x-text-input wire:model.live="name" class="block mt-1 w-full" type="text" placeholder="Project name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-text-input wire:model.live="description" class="block mt-1 w-full" type="text" placeholder="Project description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
   </x-elements.side-modal>
</div>
