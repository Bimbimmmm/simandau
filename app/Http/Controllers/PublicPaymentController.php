<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use Alert;
use App\Models\UserAddress;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\ProductImage;
use App\Models\BankAccount;

class PublicPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $datas = Payment::where('user_id', $user_id)->get();
        $address = UserAddress::where('user_id', $user_id)->first();
        return view('public/okelah/payment/index', compact('datas', 'address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idEn)
    {
      $id=Crypt::decrypt($idEn);
      $bank_account = [];
      $i=0;
      $data=Payment::where('id', $id)->first();
      $gets=PaymentItem::where('payment_id', $data->id)->get();
      foreach ($gets as $get) {
        $bank_account_data=BankAccount::where('school_operator_id', $get->cart->product->school_operator_id)->get();
        $bank_account[$i] = $bank_account_data;
        $i=$i+1;
      }
      $count=count($bank_account);
      return view('public/okelah/payment/view', compact('data', 'gets', 'bank_account', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $date_payed = \Carbon\Carbon::now();
        $rules = [
            'paymentproof'                 => 'required|mimes:pdf,png,jpg|max:2048'
        ];

        $messages = [
            'paymentproof.required'        => 'Bukti Pembayaran Wajib Diupload',
            'paymentproof.mimes'           => 'Bukti Pembayaran wajib berekstensi .pdf, .png, atau .jpg'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $file = $request->paymentproof->getClientOriginalName();;
        $request->paymentproof->move(public_path('storage/payment'), $file);

        $payment = Payment::findOrFail($id);
        $payment->update([
              'status'        => "Sudah Dibayar",
              'is_payed'      => TRUE,
              'payment_proof' => $file,
              'date_payed'    => $date_payed
            ]);

        if($payment){
              Alert::success('Berhasil', 'Bukti Pembayaran Berhasil Diupload');
              return redirect()->back();
        } else {
              Alert::error('Gagal', 'Gagal Mengupload Bukti Pembayaran! Silahkan ulangi beberapa saat lagi');
              return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
