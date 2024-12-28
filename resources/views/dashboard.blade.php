<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Donasi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Donations Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Donasi</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ number_format($totalDonations) }}</p>
                        <p class="text-gray-600 mt-2">Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Today's Donations Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Donasi Hari Ini</h3>
                        <p class="text-3xl font-bold text-green-600">{{ number_format($todayDonations) }}</p>
                        <p class="text-gray-600 mt-2">Rp {{ number_format($todayAmount, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Average Donation -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Rata-rata Donasi</h3>
                        <p class="text-3xl font-bold text-purple-600">
                            Rp {{ number_format($totalDonations > 0 ? $totalAmount / $totalDonations : 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <!-- Success Rate -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Tingkat Keberhasilan</h3>
                        <p class="text-3xl font-bold text-indigo-600">
                            {{ number_format(($totalDonations > 0 ?
                                App\Models\Donation::where('status', 'completed')->count() / $totalDonations * 100 : 0), 1) }}%
                        </p>
                    </div>
                </div>
            </div>

            <!-- Monthly Statistics -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Statistik Bulanan</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bulan
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah Donasi
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($monthlyStats as $stat)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ Carbon\Carbon::createFromFormat('Y-m', $stat->month)->format('F Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ number_format($stat->count) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        Rp {{ number_format($stat->total_amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment Methods Distribution -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Distribusi Metode Pembayaran</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($paymentMethodStats as $stat)
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-medium text-gray-700">
                                    {{ ucfirst(str_replace('_', ' ', $stat->payment_method)) }}
                                </h4>
                                <p class="text-2xl font-bold text-gray-900 mt-2">
                                    {{ number_format($stat->count) }}
                                </p>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ number_format($stat->count / $totalDonations * 100, 1) }}% dari total
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
