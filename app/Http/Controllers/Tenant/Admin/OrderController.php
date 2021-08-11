<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Requests\Admin\StoreOrder;
use App\Models\Order;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = cache()->remember('orders', 10, function() {
            return Order::get();
        });

        return view('tenant.admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('tenant.admin.orders.create');
    }

    public function store(StoreOrder $request)
    {
        Order::create([
            'name' => $request->name
        ]);

        cache()->forget('orders');

        return redirect()->route('tenant.admin.orders.index', $request->tenant()->subdomain);
    }

}
