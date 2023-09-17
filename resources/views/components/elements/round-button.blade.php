@props([
    'text' => null,
    'img' => null
])
 @if($text != null)

<button class="w-[45px] h-[45px] rounded-full bg-black text-white text-center">
    {{ $text }}
   
</button>
@elseif($img != null)
<div class="w-[5%] rounded-full">
    <img src="{{ $img }}" class="rounded-full" alt=""/>
</div>
@endif

