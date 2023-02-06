<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Scooter_kind;
use App\Models\Place;
use App\Models\Scooter;
use App\Models\Order;
use App\Models\User;

class ManagersController extends Controller
{
    public function clients() {
        $clients = DB::table('users')
                        ->where('role', '=', 2)
                        ->groupBy('users.id')
                        ->get();

        $ordersCount = User::join('orders', 'orders.user_id', '=', 'users.id') 
                            ->get();


        return view('manager.clients-manager', [
            'clients'      => $clients,
            'ordersCount'  => $ordersCount
        ]);
    }

    public function rents() {
        $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
                        ->join('scooters', 'scooters.id', '=', 'orders.scooter_id')
                        ->join('scooter_kinds', 'scooter_kinds.id', '=', 'scooters.kind_id')
                        ->get(['users.name', 'orders.id', 'scooters.kind_id', 
                        'scooter_kinds.scooter_kind', 'scooter_kinds.rent_price','orders.id', 'orders.scooter_id','scooters.is_rented']);

        return view('manager.rents-manager', [
            'orders' => $orders
        ]);
    }

    public function rentAccept($id) {
        $order = Order::find($id);

        $isAccepted = DB::table('orders')
                            ->where('id', '=', $id)
                            ->update(['is_accepted' => true]); 

        $isRented = DB::table('scooters')
                        ->where('id', '=', $order['scooter_id'])
                        ->update(['is_rented' => false]);

        return redirect()->route('manager.rents', $id)->with('success', 'Order have been successfully accepted');
    }

    public function rentRefuse($id, Request $request) {
        $order = Order::find($id);
        
        $isRented = DB::table('scooters')
                        ->where('id', '=', $order['scooter_id'])
                        ->update(['is_rented' => false]);

        $order->delete();

        return redirect()->route('manager.rents', $id)->with('success', 'Order have been successfully refused');
    }
}
