<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Donation Section -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Donasi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
                @forelse($donations as $donation)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $donation->image) }}" alt="{{ $donation->title }}">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $donation->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2 truncate" style="max-width: 100%;">{{ $donation->description }}</p>

                            <!-- Donasi Terkumpul -->
                            <div class="mt-4">
                                <p class="text-gray-600 text-sm">
                                    Total Donasi Terkumpul:
                                    <br>
                                    <span class="font-semibold text-green-600">Rp {{ number_format($donation->total_donated, 0, ',', '.') }}</span>
                                </p>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('donate', $donation) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Donasi Sekarang</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Tidak ada data donasi.</p>
                @endforelse
            </div>

            <!-- Post Section -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Postingan</h2>
                <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Upload Postingan</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($posts as $post)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        <div class="p-4">
                            <p class="text-gray-600 text-sm mt-2 truncate" style="max-width: 100%;">{{ $post->caption }}</p>

                            <div class="mt-4">
                                <a href="{{ route('posts.show', $post) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Postingan</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Tidak ada postingan.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
