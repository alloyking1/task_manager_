@props([
    'taskName',
    'tableId',
    'wireSubmitMethodName',
])

<div x-data{show:false}>
    <form wire:submit.prevent="{{ $wireSubmitMethodName }}" x-show="show">
        <div>
            <x-text-input wire:model.live="{{ $taskName }}" class="block mt-1 w-full" type="text" placeholder="Little about the task" />
            <x-text-input wire:model="{{ $tableId }}" type="text" />
           
            <x-input-error :messages="$errors->get('taskName')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            
            <x-primary-button class="ml-3 mr-2">
                {{ __('Create') }}
            </x-primary-button>
            <span @click="show=false">X</span>
        </div>
    </form>
    <button @click="show = true" x-show="show==false">Add task</button>
</div>  