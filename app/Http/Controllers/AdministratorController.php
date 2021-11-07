<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Payment;
use App\Models\Ticketing;
use App\Models\News;
use App\Models\IncomingMail;
use App\Models\ReferenceSchool;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_count=User::where(['is_guest' => TRUE, 'is_deleted' => FALSE])->count();
        $product_count=Products::where('is_deleted', FALSE)->count();
        $payment_count=Payment::all()->count();
        $ticketing_count=Ticketing::where('is_deleted', FALSE)->count();
        $news_count=News::where('is_deleted', FALSE)->count();
        $mail_count=IncomingMail::all()->count();
        $school_count=ReferenceSchool::all()->count();
        return view('administrator/index', compact('user_count', 'product_count', 'payment_count', 'ticketing_count', 'news_count', 'mail_count', 'school_count'));
    }

}
