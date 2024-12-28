<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total donations
        $totalDonations = Donation::count();
        $totalAmount = Donation::sum('amount');

        // Today's donations
        $todayDonations = Donation::whereDate('created_at', Carbon::today())->count();
        $todayAmount = Donation::whereDate('created_at', Carbon::today())->sum('amount');

        // Monthly statistics
        $monthlyStats = Donation::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(amount) as total_amount')
        )
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->limit(6)
            ->get();

        // Payment method distribution
        $paymentMethodStats = Donation::select('payment_method', DB::raw('COUNT(*) as count'))
            ->groupBy('payment_method')
            ->get();

        return view('dashboard', compact(
            'totalDonations',
            'totalAmount',
            'todayDonations',
            'todayAmount',
            'monthlyStats',
            'paymentMethodStats'
        ));
    }
}
