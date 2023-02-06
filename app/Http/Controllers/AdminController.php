<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Scooter_kind;
use App\Models\Place;
use App\Models\Scooter;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function scooters() {
        $scooter_kinds = Scooter_kind::all();

        return view('admin.scooters-admin', [
            'scooter_kinds' => $scooter_kinds
        ]);
    }

    public function rentPlaces() {
        $rent_places = Place::all();

        return view('admin.rent-places-admin', [
            'rent_places' => $rent_places
        ]);
    }

    public function clients() {
        $clients = DB::table('users')
                        ->where('role', '=', 2)
                        ->groupBy('users.id')
                        ->get();

        $ordersCount = User::join('orders', 'orders.user_id', '=', 'users.id') 
                            ->get();


        return view('admin.clients-admin', [
            'clients'      => $clients,
            'ordersCount'  => $ordersCount
        ]);
    }

    public function managers() {
        $managers = DB::table('users')
                        ->where('role', '=', 3)
                        ->get();

        $sellsCount = Order::join('users', 'users.id', '=', 'orders.manager_id')
                            ->where('role', '=', 3)
                            ->get();

        return view('admin.managers-admin', [
            'managers'   => $managers,
            'sellsCount' => $sellsCount
        ]);
    }

    public function addNewKind() {
        return view('admin.add-new-kind');
    }

    public function addNewKindButton(Request $request) {
        $request->validate([
            'scooter_kind'=>'required',
            'rent_price'=>'required'
        ]);

        $query = DB::table('scooter_kinds')->insert([
            'scooter_kind' => $request->input('scooter_kind'),
            'rent_price'   => $request->input('rent_price')
        ]);

        if ($query) {
            return back()->with('success', 'Data have been successfuly inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function showOneKind($id) {
        $scooter_kind = new Scooter_kind;
        $scooter_kinds = DB::table('scooter_kinds')->where('scooter_kinds.id', '=', $id)->get();

        $scooters = Scooter::join('scooter_kinds', 'scooter_kinds.id', '=', 'scooters.kind_id')
                            ->join('places', 'places.id', '=', 'scooters.place_id')
                            ->where('scooters.kind_id', '=', $id)
                            ->get(['scooter_kinds.scooter_kind', 'places.rent_place', 'scooter_kinds.rent_price', 'scooters.id']);

        return view('admin.scooter-admin', [
            'data'          => $scooter_kind->find($id),
            'scooters'      => $scooters,
            'scooter_kinds' => $scooter_kinds
        ]);
    }

    public function deleteOneScooterKind($id) {
        Scooter_kind::find($id)->delete();
        return redirect()->route('admin.scooters')->with('success', 'Data have been successfuly deleted');
    }

    public function addNewScooter($id) {
        $scooter_kind = new Scooter_kind;
        $scooter_kinds = Scooter_kind::all();
        $rent_places = Place::all();
        $managers = DB::table('users')
                        ->where('role', '=', 3)
                        ->get();

        $scooter_prices = DB::table('scooters')
                            ->join('scooter_kinds', 'scooter_kinds.id', '=', 'scooters.rent_price_id')
                            ->get('scooters.rent_price_id');

        return view('admin.add-new-scooter', [
            'scooter_kind'   =>  $scooter_kind->find($id),
            'scooter_kinds'  =>  $scooter_kinds,
            'rent_places'    =>  $rent_places,
            'managers'       =>  $managers,
            'scooter_prices' =>  $scooter_prices
        ]);
    }

    public function addNewScooterButton(Request $request, $id) {

        $scooter = new Scooter([
            'kind_id'        =>  $request->get('kind_id'),
            'place_id'       =>  $request->get('place_id'),
            'manager_id'     =>  $request->get('manager_id'),
            'rent_price_id'  =>  $request->get('kind_id'),
            'user_name_id'   =>  0,
            'is_rented'      =>  false
        ]);

        $scooter_kind = new Scooter_kind;
        $scooter_kind->find($id);

        $scooter->save();

        if ($scooter) {
            return redirect()->route('admin.scooter', $id)->with('success', 'Data have been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
        
    }

    public function deleteOneScooter($id, $scooterId) {
        $scooter = new Scooter;
        $scooter_kind = new Scooter_kind;
        // $scooter_kinds = Scooter_kind::all();
        // $scooters = Scooter::all();
        
        Scooter::find($scooterId)->delete();

        $scooter_kind->find($id);
        $scooter->find($scooterId);

        return redirect()->route('admin.scooter', $id)->with('success', 'Data have been successfully deleted');
    }

    public function addNewRentPlace() {
        return view('admin.add-new-rent-place');
    }

    public function addNewRentPlaceButton(Request $request) {
        $request->validate([
            'rent_place'=>'required'
        ]);

        $query = DB::table('places')->insert([
            'rent_place'=>$request->input('rent_place')
        ]);

        if ($query) {
            return back()->with('success', 'Data have been successfuly inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function deleteOneRentPlace($id) {
        Place::find($id)->delete();
        return redirect()->route('admin.rent-places')->with('success', 'Data have been successfuly deleted');
    }
}
