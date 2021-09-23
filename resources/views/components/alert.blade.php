@if($message = session('success'))
    <div class="max-w-7xl mx-auto bg-g pt-6 lg:px-8">
        <div class="bg-green-100 mb-4 px-5 py-4 w-full border-l-4 border-green-500">
            <div class="flex justify-between">
                <div class="flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                         class="flex-none fill-current text-green-500 h-4 w-4">
                        <path
                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z"/>
                    </svg>
                    <div class="flex-1 leading-tight text-sm text-green-700 font-medium">{{ $message }}</div>
                </div>
            </div>
        </div>
    </div>
@endif
@if($errors->all())
    <div class="max-w-7xl mx-auto bg-g pt-6 lg:px-8">
        <div class="bg-red-100 mb-4 px-5 py-4 w-full border-l-4 border-red-500">
            <div class="flex justify-between">
                <div class="flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-none fill-current text-red-500 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1 leading-tight text-sm text-red-700 font-medium">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
