<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\IncomingMail;

class AdminMailController extends Controller
{
  public function index(){
    $datas=IncomingMail::latest()->get();
    return view('administrator/mail/index', compact('datas'));
  }

  public function destroy($id){
    $delete=IncomingMail::findOrFail($id);
    $delete->delete();

    if($delete){
        Alert::success('Berhasil', 'Surat Berhasil Dihapus');
        return redirect()->route('adminmailindex');
    } else {
        Alert::error('Gagal', 'Gagal Menghapus Surat! Silahkan ulangi beberapa saat lagi');
        return redirect()->route('adminmailindex');
    }
  }
}
