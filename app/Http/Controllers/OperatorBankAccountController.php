<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App\Models\BankAccount;
use App\Models\SchoolOperator;

class OperatorBankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = auth()->user()->id;
      $datas=BankAccount::where(['user_id' => $user_id, 'is_deleted' => FALSE])->get();
      $count=BankAccount::where(['user_id' => $user_id, 'is_deleted' => FALSE])->count();
      return view('operator/bankAccount/index', compact('datas' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('operator/bankAccount/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank_name;
        $bank_icon;
        $user_id = auth()->user()->id;
        $school_operator=SchoolOperator::where('user_id', $user_id)->first();
        if($request->bank_name == "124"){
          $bank_name="BANK KALTIMTARA";
          $bank_icon="bpd.jpg";
        }else if($request->bank_name == "008"){
          $bank_name="BANK MANDIRI";
          $bank_icon="mandiri.jpg";
        }else if($request->bank_name == "009"){
          $bank_name="BANK NEGARA INDONESIA (BNI)";
          $bank_icon="bni.jpg";
        }else if($request->bank_name == "002"){
          $bank_name="BANK RAKYAT INDONESIA (BRI)";
          $bank_icon="bri.jpg";
        }else if($request->bank_name == "014"){
          $bank_name="BANK CENTRAL ASIA (BCA)";
          $bank_icon="bca.jpg";
        }

        $rules = [
            'bank_name'             => 'required',
            'owner_name'            => 'required|min:3',
            'account_number'        => 'required|min:6'
        ];

        $messages = [
            'bank_name.required'        => 'Nama Bank wajib diisi',
            'owner_name.required'       => 'Nama Pemilik rekening wajib diisi',
            'owner_name.min'            => 'Nama Pemilik minimal 3 huruf',
            'account_number.required'   => 'Nomor rekening wajib diisi',
            'account_number.min'        => 'Nomor Rekening minimal 6 karakter'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $bank = new BankAccount;
        $bank->bank_name = $bank_name;
        $bank->owner_name = $request->owner_name;
        $bank->account_number = $request->account_number;
        $bank->bank_icon = $bank_icon;
        $bank->user_id = $user_id;
        $bank->school_operator_id = $school_operator->id;
        $bank->is_deleted = FALSE;
        $save = $bank->save();

        if($save){
            Session::flash('success', 'Nomor Rekening Berhasil Ditambahkan');
            return redirect()->route('operatorbankindex');
        } else {
            Session::flash('errors', ['' => 'Gagal Menambahkan Nomor Rekening! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('operatorbankadd');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bank = BankAccount::findOrFail($id);
      $bank->update([
            'is_deleted'   => TRUE
        ]);
      return redirect()->back();
    }
}
