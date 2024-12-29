<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Postingan
            </h2>
            <a href="{{ route('posts.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Tambah Postingan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Caption</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @forelse($posts as $post)
                        <tr>
                            <td class="px-6 py-4">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 truncate" style="max-width: 200px;">{{ $post->caption }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.edit', $post) }}"
                                   class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data donasi yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
