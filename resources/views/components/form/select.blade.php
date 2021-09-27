<select {{ $attributes }}  class="h-10 border mt-1 rounded-full px-4 w-full py-2 bg-gray-50 focus:outline-none">
    <option value="{{ null }}">{{ $firstValue ?? 'Please select option' }}</option>
    @foreach($options as $key => $option)
        <option value="{{ $key }}" @if($selected == $key) selected @endif >{{ $option }}</option>
    @endforeach
</select>
