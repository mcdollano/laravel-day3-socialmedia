<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FriendRequests;
use Auth;
use DB;

class FriendRequestsController extends Controller
{
    function showmain(){
    	$users = User::all();
    	$requests = FriendRequests::all();
    	$friendrequests = DB::table('friend_requests')
        ->join('users', function ($join) {
            $join->on('friend_requests.from', '=', 'users.id')
                 ->where('users.id', '=', 'friend_requests.to');
        })->get();
        dd($friendrequests);
    	return view('users', compact('users','requests','friendrequests'));
    }

    function add_friend($id){
    	$friend_requester = Auth::user()->id;
    	$friend_tba = DB::table('friend_requests')->insert([
    		'from' => $friend_requester,
    		'to' => $id,
    		'status' => 0,
    		]);
    	return back();
    }

    function show_requests(){


    }

}
