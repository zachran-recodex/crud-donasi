<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Postingan
            </h2>
            <a href="{{ route('posts.index') }}"
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                Gambar
                            </label>
                            <input type="file"
                                   name="image"
                                   id="image"
                                   class="shadow appearance-none border border-gray-600 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @if($post->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Postingan" class="w-32 rounded-lg">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Caption
                            </label>
                            <textarea name="caption"
                                      id="caption"
                                      class="shadow appearance-none border border-gray-600 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                      rows="3"
                                      required>{{ $post->caption }}</textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
