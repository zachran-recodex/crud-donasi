<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $donation->title }}
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
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Gambar Donasi -->
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $donation->image) }}" alt="{{ $donation->title }}" class="w-full h-[500px] object-cover rounded-lg shadow-md">
                </div>

                <!-- Deskripsi Donasi -->
                <div class="mb-6">
                    <p class="text-gray-700 text-lg">{{ $donation->description }}</p>
                </div>

                <!-- Donasi yang sudah terkumpul -->
                <div class="mb-6">
                    <p class="text-gray-700 text-lg font-semibold">Total Donasi Terkumpul:</p>
                    <p class="text-green-600 text-xl">
                        Rp {{ number_format($donation->total_donated, 0, ',', '.') }}
                    </p>
                </div>

                    <!-- Tampilan List Semua Transaksi Donasi -->
                    <div class="mb-6">
                        <p class="text-gray-700 text-lg font-semibold mb-4">Daftar Donasi:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($transactions as $transaction)
                                <div class="bg-white shadow-lg rounded-lg p-4 hover:bg-gray-50 transition duration-300 ease-in-out">

                                    <!-- Konten Donasi -->
                                    <div class="flex flex-col space-y-4">
                                        <p class="text-gray-800 font-semibold">{{ $transaction->user->name }}</p>
                                        <p class="text-gray-600 text-sm">
                                            Donasi pada <span class="font-semibold">{{ $transaction->created_at->format('d M Y H:i') }}</span> dengan jumlah <br>
                                            <strong class="text-green-500">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</strong>.
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                @if($donation->status)
                    <div class="mt-6">
                        <form action="{{ route('donate.submit', $donation->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="amount" class="block text-gray-700">Jumlah Donasi</label>
                                <input type="number" id="amount" name="amount" min="1" required class="mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Donasi Sekarang
                            </button>
                        </form>
                    </div>
                @else
                    <div class="mt-6 text-gray-500">
                        Donasi ini sedang tidak aktif.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
