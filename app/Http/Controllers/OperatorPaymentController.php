<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use Alert;
use App\Models\Payment;
use App\Models\PaymentItem;

class OperatorPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $product=[];
        $i=0;
        $datas = PaymentItem::all();
        foreach($datas as $data){
          if($data->cart->product->user_id == $user_id){
            $product[$i] = $data;
          }
          $i=$i+1;
        }
        $count=count($product);
        return view('operator/payment/index', compact('product', 'count'));
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
        //
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
        $data = Payment::where('id', $id)->first();
        return view('operator/payment/view', compact('data'));
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
        $date_shipped = \Carbon\Carbon::now();
        $rules = [
            'shipping_carrier'             => 'required',
            'shipping_number'              => 'required'
        ];

        $messages = [
            'shipping_carrier.required'    => 'Nama Ekspedisi Wajib Diisi',
            'shipping_number.required'     => 'Nomor Resi Wajib Diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $payment = Payment::findOrFail($id);
        $payment->update([
              'status'            => "Sudah Dikirim",
              'shipping_carrier'  => $request->shipping_carrier,
              'shipping_number'   => $request->shipping_number,
              'is_finished'       => TRUE,
              'date_shipped'      => $date_shipped
            ]);

        if($payment){
              Alert::success('Berhasil', 'Produk Sudah Dikirimkan');
              return redirect()->route('operatorpayment');
        } else {
              Alert::error('Gagal', 'Gagal Mengupload Bukti Pengiriman! Silahkan ulangi beberapa saat lagi');
              return redirect()->back();
        }
    }

    public function reject(Request $request, $id)
    {
      $date_shipped = \Carbon\Carbon::now();
      $rules = [
          'pending_reason'             => 'required'
      ];

      $messages = [
          'pending_reason.required'    => 'Alasan Penolakan Wajib Diisi'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
      }

      $payment = Payment::findOrFail($id);
      $payment->update([
            'status'            => "Sedang dalam proses penolakan oleh sekolah",
            'is_pending'        => TRUE,
            'pending_reason'    => $request->pending_reason
      ]);

      if($payment){
            Alert::success('Berhasil', 'Produk Sudah Ditolak');
            return redirect()->route('operatorpayment');
      } else {
            Alert::error('Gagal', 'Gagal Mengupload Alasan Penolakan! Silahkan ulangi beberapa saat lagi');
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
