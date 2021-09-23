<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create task.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{route('tasks.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid py-8 px-6 px-2 text-sm md:grid-cols-3">

                    <x-form.input-group :type="'select'" :name="'user_id'" :title="'Assigned User'" :value="old('title')" >
                        <x-form.select :options="$users" :selected="old('user_id') ?? ''" name="user_id" id="user_id" />
                    </x-form.input-group>

                    <x-form.input-group :type="'text'" :name="'title'" :title="'Title'" :value="old('title')" />

                    <x-form.input-group :type="'textarea'" :name="'content'" :title="'Content'"  rows="10" :value="old('content')" />

                    <x-form.input-group :type="'number'" :name="'velocity'" :title="'Velocity'" :value="old('velocity')" />

                    <x-form.input-group :type="'number'" :name="'priority'" :title="'Priority'" :value="old('priority')" />

                    <x-form.input-group :type="'select'" :name="'task_status_id'" :title="'Task Status'" :value="old('task_status_id')" >
                        <x-form.select :options="$taskStatuses" :selected="old('task_status_id') ?? ''" name="task_status_id" id="task_status_id" />
                    </x-form.input-group>

                    <x-form.input-group :type="'file'" :name="'image_path'" :title="'Image'" :value="old('image_path')" />

                    <div class="col-span-5">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
