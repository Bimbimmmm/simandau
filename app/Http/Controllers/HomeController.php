<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Alert;

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
         Alert::success('Selamat Datang', 'Anda Berhasil Login Sebagai Admin');
         return redirect()->route('administrator', $idEn);
    }

    if ($request->user()->is_operator == 1){
         $idEn=Crypt::encrypt($request->user()->id);
         Alert::success('Selamat Datang', 'Anda Berhasil Login Sebagai Operator');
         return redirect()->route('operator', $idEn);
    }

    if ($request->user()->is_guest == 1){
         $idEn=Crypt::encrypt($request->user()->id);
         Alert::success('Selamat Datang', 'Anda Berhasil Login Sebagai Tamu');
         return redirect()->route('home', $idEn);
    }
    if($request->user()->id == null){
      return redirect()->route('home');
    }
  }
}
