<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{-- Posts Added (<b>Author: </b> {{ $post->author->name }}) --}}
            <a href="{{ route('admin.posts.index') }}" class="px-5 py-2 bg-red-400 text-grey">Posts</a>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.posts.store')}}">
                        @csrf
                        @method('POST')
                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Title</label>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" placeholder="title" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Description</label>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea type="text" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="9" placeholder="description" name="description">{{old('description') }}</textarea>
                        </div>

                        <button class="px-4 py-2 rounded text-grey inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">save</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
