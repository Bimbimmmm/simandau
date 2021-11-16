<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\IncomingMail;

class PublicIncomingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=IncomingMail::all();
        return view('public/mail/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public/mail/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $macAddr = exec('getmac');
        $ipAddr=\Request::ip();
        if(Auth::check()) {
          $user_id = auth()->user()->id;
        }
        $rules = [
            'institution'           => 'required|min:3',
            'position'              => 'required',
            'title'                 => 'required',
            'importance_level'      => 'required',
            'contact'               => 'required',
            'file'                  => 'required|mimes:pdf|max:2048'
        ];

        $messages = [
            'institution.required'        => 'Nama instansi wajib diisi',
            'institution.min'             => 'Nama instansi minimal 3 karakter',
            'title.required'              => 'Nama surat wajib diisi',
            'importance_level.required'   => 'Prioritas surat wajib diisi',
            'contact.required'            => 'Kontak pengitim wajib diisi',
            'file.required'               => 'Surat wajib diupload',
            'file.mimes'                  => 'Surat wajib berekstensi .pdf'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $file = $request->file->getClientOriginalName();
        $request->file->move(public_path('storage/incoming_mail'), $file);

        $mail = new IncomingMail;
        if(Auth::check()) {
          $mail->user_id = $user_id;
        }
        $mail->full_name = $request->full_name;
        $mail->institution = $request->institution;
        $mail->position = $request->position;
        $mail->title = $request->title;
        $mail->importance_level = $request->importance_level;
        $mail->contact = $request->contact;
        $mail->file = $file;
        $mail->mac_address = $macAddr;
        $mail->ip_address = $ipAddr;
        $save = $mail->save();

        if($save){
            Alert::success('Berhasil', 'Surat Berhasil Dikirim');
            return redirect()->route('publicmail');
        } else {
            Alert::error('Gagal', 'Gagal Mengirim Surat! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('publicmail');
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
