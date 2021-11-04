<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use Alert;
use App\Models\Payment;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Payment::where('is_pending', TRUE)->get();
        return view('administrator/transaction/index', compact('datas'));
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
      $data=Payment::where('id', $id)->first();
      return view('administrator/transaction/view', compact('data'));
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
      $rules = [
          'status'             => 'required'
      ];

      $messages = [
          'status.required'    => 'Status Wajib Diisi'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
      }

      $payment = Payment::findOrFail($id);
      $payment->update([
            'status'            => "Penolakan Oleh Sekolah Ditolak Oleh Admin, Sekolah Harus Mengirim Barang Ke Pembeli",
            'is_pending'        => FALSE
          ]);

      if($payment){
            Alert::success('Berhasil', 'Banding Transaksi Sudah Diproses');
            return redirect()->route('admintransactionindex');
      } else {
            Alert::error('Gagal', 'Gagal Memproses Banding Transaksi! Silahkan ulangi beberapa saat lagi');
            return redirect()->back();
      }
    }


    public function reject(Request $request, $id)
    {
      $date_shipped = \Carbon\Carbon::now();
      $rules = [
          'reject_reason'             => 'required'
      ];

      $messages = [
          'reject_reason.required'    => 'Alasan Penolakan Wajib Diisi'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
      }

      $payment = Payment::findOrFail($id);
      $payment->update([
            'status'            => "Ditolak Oleh Administrator",
            'is_pending'        => FALSE,
            'is_rejected'       => TRUE,
            'reject_reason'     => $request->reject_reason
      ]);

      if($payment){
            Alert::success('Berhasil', 'Banding Transaksi Sudah Diproses');
            return redirect()->route('admintransactionindex');
      } else {
            Alert::error('Gagal', 'Gagal Memproses Banding Transaksi! Silahkan ulangi beberapa saat lagi');
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
