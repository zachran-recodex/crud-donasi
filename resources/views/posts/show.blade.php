<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Postingan
            </h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6">

                <div class="mb-4">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="border rounded-lg shadow-md w-full h-[500px]">
                </div>

                <div class="mb-4">
                    <p class="text-gray-700 text-xl">{{ $post->caption }}</p>
                </div>

                <!-- Form Tambah Komentar -->
                <div class="mt-6">
                    <h4 class="text-lg font-bold mb-2">Tambahkan Komentar</h4>
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <textarea name="comment" rows="4"
                                  class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"
                                  placeholder="Tulis komentar Anda di sini..." required></textarea>
                        @error('comment')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">
                            Kirim Komentar
                        </button>
                    </form>
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-bold mb-4">Komentar</h4>
                    @forelse($post->comments as $comment)
                        <div class="mb-4 border-b pb-4">
                            <p class="text-gray-800"><strong>{{ $comment->user_name }}</strong></p> <!-- Nama Pengguna -->
                            <p class="text-gray-700">{{ $comment->comment }}</p>
                            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada komentar.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
