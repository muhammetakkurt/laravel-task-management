<select {{ $attributes }}  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
    <option value="">Please select option</option>
    @foreach($options as $key => $option)
        <option value="{{ $key  }}" @if($selected == $key) selected @endif >{{ $option }}</option>
    @endforeach
</select>
