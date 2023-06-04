<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @role('admin')
                {{ __('Admin Dashboard') }} <br>
                <a href="{{route('admin.adminTest')}}"  class="px-5 py-2 bg-green-400 text-indigo-700 cursor-pointer">Admin Route</a>
            @endrole()

            @role('editor')
                {{ __('Editor Dashboard') }} <br>
                <a href="{{route('admin.editorTest')}}"  class="px-5 py-2 bg-green-400 text-indigo-700 cursor-pointer">Editor Route</a>
            @endrole()

            @role('author')
                {{ __('Author Dashboard') }} <br>
                <a href="{{route('admin.authorTest')}}"  class="px-5 py-2 bg-green-400 text-white cursor-pointer">Author Route</a>
            @endrole()
        </h2>
        <h2  class="text-l text-gray-800 leading-tight">
            @permission('create-post')
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Create </button>
            @endpermission

            @permission('read-post')
                <button type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Read</button>
            @endpermission()

            @permission('update-post')
                <button type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Update </button>
            @endpermission

            @permission('delete-post')
                <button type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Delete</button>
            @endpermission

            <a href="{{ route('admin.posts.index') }}" class="px-5 py-2 bg-red-400 text-grey">Posts</a>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
