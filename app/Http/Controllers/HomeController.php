<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
    if ($request->user()->is_admin == 1){
         $idEn=Crypt::encrypt($request->user()->id);
         return redirect()->route('administrator', $idEn);
    }

    if ($request->user()->is_operator == 1){
         $idEn=Crypt::encrypt($request->user()->id);
         return redirect()->route('operator', $idEn);
    }

    if ($request->user()->is_guest == 1){
         $idEn=Crypt::encrypt($request->user()->id);
         return redirect()->route('home', $idEn);
    }
    if($request->user()->id == null){
      return view('public/home');
    }
  }
}
