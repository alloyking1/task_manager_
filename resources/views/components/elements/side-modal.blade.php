@props([])

{{-- parent component need to have x-data for alpineJS to work --}}
<div 
class="bg-gray-300 shadow-sm rounded-l-md col-span-2 top-0 bottom-0 right-0 w-full md:w-1/2 fixed p-8"
 x-show="show"
 x-transition
 x-on:click.outside="show = false"
>
    <div class="grid mx-auto w-auto place-contents-center">
        <x-elements.justify-between>

    
            <h3 class="text-3xl font-bold mb-4">New Projects</h3>
            <span x-on:click="show = !show">
                <x-elements.round-button text="x"/>
            </span>
        </x-elements.justify-between>

        <div class="mt-[10%]">
            {{ $slot }}
        </div>
    </div>
</div>