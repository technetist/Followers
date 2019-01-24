<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggleFollow(Request $request)
    {
        $user = User::find($request->user_id);
        $response = auth()->user()->toggleFollow($user);

        return response()->json(['success' => $response]);
    }
}
