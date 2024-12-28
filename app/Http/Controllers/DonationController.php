<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::orderBy('created_at', 'desc')->get();
        return view('donations.index', compact('donations'));
    }

    public function create()
    {
        return view('donations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
            'message' => 'nullable|string'
        ]);

        Donation::create($validated);

        return redirect()->route('donations.index')
            ->with('success', 'Terima kasih atas donasi Anda!');
    }

    public function edit(Donation $donation)
    {
        return view('donations.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
            'message' => 'nullable|string'
        ]);

        $donation->update($validated);

        return redirect()->route('donations.index')
            ->with('success', 'Donasi berhasil diperbarui.');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donations.index')
            ->with('success', 'Donasi berhasil dihapus.');
    }
}
