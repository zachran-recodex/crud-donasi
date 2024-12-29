<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Donasi
            </h2>
            <a href="{{ route('donations.index') }}"
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold">{{ $donation->title }}</h3>
                    <span class="px-2 py-1 rounded text-white {{ $donation->status ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ $donation->status ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>

                <div class="mb-4">
                    <img src="{{ asset('storage/' . $donation->image) }}" alt="{{ $donation->title }}" class="border rounded-lg shadow-md w-full">
                </div>

                <div class="mb-4">
                    <h4 class="text-lg font-bold">Deskripsi</h4>
                    <p class="text-gray-700">{{ $donation->description }}</p>
                </div>

                <div class="flex space-x-4 mt-6">
                    <a href="{{ route('donations.edit', $donation) }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Edit
                    </a>
                    <form action="{{ route('donations.destroy', $donation) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Yakin ingin menghapus donasi ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
