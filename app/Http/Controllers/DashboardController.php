<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $donations = Donation::where('status', true)->get();

        return view('dashboard', compact('donations'));
    }

    public function showDonation(Donation $donation)
    {
        $transactions = $donation->transactions()->latest()->get();

        return view('donation', compact('donation', 'transactions'));
    }

    public function donate(Request $request, $donationId)
    {
        $donation = Donation::findOrFail($donationId);

        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // Simpan transaksi donasi
        $donationTransaction = DonationTransaction::create([
            'donation_id' => $donation->id,
            'user_id' => Auth::id(),
            'amount' => $request->amount,
        ]);

        // Update total_donated pada tabel Donation
        $donation->total_donated += $request->amount;
        $donation->save();

        // Redirect dengan pesan sukses
        return redirect()->route('donate', ['donation' => $donation])->with('success', 'Terima kasih telah berdonasi!');
    }
}
