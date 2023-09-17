@props([
    'name',
    'members'
])

<div class="flex gap-4 justify-between">
    <div class="flex flex-col gap-6">
        <p>{{ $name }}</p>
        <div class="flex">
            <x-elements.round-button
                img="https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8ZmFjZXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80"
            />
            <x-elements.round-button
                img="https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8ZmFjZXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80"
            />
        </div>
    </div>
    <div class="flex justify-between gap-1">
       {{ $slot }}
    </div>
    
</div>