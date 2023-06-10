<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('admin.posts.create')}}">Create post</a>
                    <table class="border" style="width: 100%;">
                        <thead class="">
                            <tr class="border ">
                                <th class="bg-gray-600 p-2 ">Title</th>
                                <th class="bg-gray-600 p-2 ">User</th>
                                <th class="bg-gray-600 p-2 ">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr class="border">
                                <td>{{ $post->title }}</td>
                                <td class="text-center">{{ $post->author->name }}</td>
                                <td class="text-center"> <a href="{{ route('admin.posts.edit',$post->id) }}" class="">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
