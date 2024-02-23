<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rateLimitController extends Controller
{
    public function index(Request $request) {
        // echo $request->ip();
        if($request->ajax()) {
            return response()->json(['status' => 1,'msg' => 'Session is started.']);
        }
    }

    public function check_session() {
        return view('check_session/index');
    }
}
