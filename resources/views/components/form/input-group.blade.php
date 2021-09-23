<div class="col-span-5 pb-3">
    <label for="{{ $name }}">{{ $title }}</label>
    @if(in_array($type , ['text', 'number', 'file']))
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $value }}" />
    @elseif($type == 'textarea')
        <textarea type="{{$type}}" name="{{$name}}" id="{{$name}}" class="border mt-1 rounded px-4 w-full bg-gray-50" {{ $attributes }}>{{ $value }}</textarea>
    @elseif(in_array($type , ['select']))
        {{ $slot }}
    @endif
    @error($name)
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
