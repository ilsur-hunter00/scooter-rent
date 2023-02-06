<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Scooter_kind;
use App\Models\Place;
use App\Models\Scooter;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function scooters() {
        $scooter_kinds = Scooter_kind::all();

        return view('user.scooters', [
            'scooter_kinds' => $scooter_kinds
        ]);
    }

    public function scooter($id, Request $request) {
        $scooter_kind = new Scooter_kind;
        $scooter_kinds = DB::table('scooter_kinds')->where('scooter_kinds.id', '=', $id)->get();

        $scooters = Scooter::join('scooter_kinds', 'scooter_kinds.id', '=', 'scooters.kind_id')
                            ->join('places', 'places.id', '=', 'scooters.place_id')
                            ->where('scooters.kind_id', '=', $id)
                            ->get(['scooter_kinds.scooter_kind', 'places.rent_place', 
                            'scooter_kinds.rent_price', 'scooters.id', 
                            'scooters.manager_id', 'scooters.user_name_id', 'scooters.is_rented']);

        return view('user.scooter', [
            'scooter_kind'  => $scooter_kind->find($id),
            'scooters'      => $scooters,
            'scooter_kinds' => $scooter_kinds
        ]);
    }

    public function scooterRent($id, $scooterId, Request $request) {
        
        $order = new Order([
            'scooter_id'     =>  $request->get('scooterId'),
            'manager_id'     =>  $request->get('managerId'),
            'user_id'        =>  $request->get('userId'),
            'is_accepted'    =>  false
        ]);

        $order->save();

        DB::table('scooters')
                    ->where('id', '=', $request->get('scooterId'))
                    ->update(['is_rented' => true]);

        DB::table('orders')
                    ->where('user_id', '=', 0)
                    ->update(['user_id' => $request->user()->id]);

        $scooter_kind = new Scooter_kind;
        $scooter = new Scooter;

        if ($scooter) {
            return redirect()->route('user.scooter', $id)->with('success', 'Scooter have been successfully rented');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function rentPlaces() {
        $rent_places = Place::all();

        return view('user.rent-places', [
            'rent_places' => $rent_places
        ]);
    }

    public function reviews() {
        $reviewsModel = new Review();
        $reviewsModel->setConnection('pgsql2');

        $reviews = $reviewsModel->all();

        return view('user.reviews', [
            'reviews' => $reviews
        ]);
    }

    public function createReview() {
        return view('user.create-review');
    }

    public function createReviewButton(Request $request) {
        $request->validate([
            'review_head'=>'required',
            'review_text'=>'required'
        ]);

        $query = DB::connection('pgsql2')->table('reviews')->insert([
            'review_head' => $request->input('review_head'),
            'review_text'   => $request->input('review_text')
        ]);

        if ($query) {
            return back()->with('success', 'Data have been successfuly inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function deleteReview($id) {
        Review::find($id)->delete();
        return redirect()->route('user.reviews')->with('success', 'Data have been successfuly deleted');
    }
}
