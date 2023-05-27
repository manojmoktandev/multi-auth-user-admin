<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @role('admin')
                {{ __('Admin Dashboard') }}
            @endrole()

            @role('editor')
                {{ __('Editor Dashboard') }}
            @endrole()

            @role('author')
                {{ __('Author Dashboard') }}
            @endrole()

            {{-- @permission('create-post')
                <button> Create Post Button </button>
            @endpermission --}}

            @permission('read-post')
                <button> Read Post Button </button>
            @endpermission()

                {{-- @permission('update-post')
                <button> Update Post Button </button>
            @endpermission

            @permission('delete-post')
                <button> Delete Post Button </button>
            @endpermission --}}

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
