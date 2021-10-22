<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ReferenceSchool;
use App\Models\SchoolOperator;
use Validator;
use Hash;
use Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=User::where(['is_admin' => FALSE, 'is_deleted' => FALSE])->get();
        return view('administrator/users/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = ReferenceSchool::all();
        return view('administrator/users/add', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

          'first_name'            => 'required|min:3',
          'last_name'             => 'required|min:3',
          'email'                 => 'required|email|unique:users,email',
          'id_number'             => 'required|unique:users,id_number',
          'password'              => 'required|confirmed|min:8',
          'school_name'           => 'required'

        ];

        $messages = [
          'first_name.required'   => 'Nama depan wajib diisi',
          'first_name.min'        => 'Nama depan minimal 3 karakter',
          'last.required'         => 'Nama belakang wajib diisi',
          'last.min'              => 'Nama belakang minimal 3 karakter',
          'id_number.required'    => 'Nomor Induk Pegawai wajib diisi',
          'id_number.unique'      => 'Nomor Induk Pegawai sudah terdaftar',
          'email.required'        => 'Email wajib diisi',
          'email.email'           => 'Email tidak valid',
          'email.unique'          => 'Email sudah terdaftar',
          'password.required'     => 'Password wajib diisi',
          'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
          'password.min'          => 'Password minimal 8 karakter',
          'school_name.required'  => 'Nama sekolah wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $macAddr = exec('getmac');
        $ipAddr=\Request::ip();

        $user = new User;
        $user->first_name = ucwords(strtolower($request->first_name));
        $user->last_name = ucwords(strtolower($request->last_name));
        $user->id_number = $request->id_number;
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->is_admin = FALSE;
        $user->is_operator = TRUE;
        $user->is_guest = FALSE;
        $user->mac_address = $macAddr;
        $user->ip_address = $ipAddr;
        $user->is_deleted = FALSE;
        $save = $user->save();

        $get=User::where('id_number', $request->id_number)->first();

        $operator = new SchoolOperator;
        $operator->user_id = $get->id;
        $operator->school_id = $request->school_name;
        $operator->is_active = TRUE;
        $operator->is_deleted = FALSE;
        $save2 = $operator->save();

        if($save2){
          Session::flash('success', 'Penambahan data berhasil!');
          return redirect()->route('adminuserindex');
        } else {
          Session::flash('errors', ['' => 'Penambahan data gagal! Silahkan ulangi beberapa saat lagi']);
          return redirect()->route('adminusercreate');
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
        //
    }
}
