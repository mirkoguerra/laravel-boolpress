<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TestController extends Controller
{

  public function guest() {
    return view('free_or_restricted');
  }

  public function logged() {

    if (Auth::check()) {

      $user = Auth::user();

      return view('free_or_restricted', compact('user'));

    } else {
      return redirect()->route('login');
    }

  }
}
