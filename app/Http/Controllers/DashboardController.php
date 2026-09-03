<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_stock' => Product::sum('stock'),
            'total_orders' => Order::count(),
            'total_revenue' => Order::where('status', 'selesai')->sum('total_price'),
        ];

        return view('dashboard', compact('stats'));
    }
}