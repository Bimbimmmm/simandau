<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Alert;
use App\Models\Ticketing;
use App\Models\TicketingMessage;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Ticketing::latest()->get();
        return view('administrator/ticket/index', compact('datas'));
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
      $data = Ticketing::where('id', $id)->first();
      $messages = TicketingMessage::where('ticketing_id', $id)->latest()->get();
      return view('administrator/ticket/show', compact('data', 'messages'));
    }

    public function reply(Request $request, $idEn)
    {
      $id=Crypt::decrypt($idEn);
      $user_id = auth()->user()->id;
      $rules = [
          'message'               => 'required'
      ];

      $messages = [
          'message.required'           => 'Pesan wajib diisi'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
      }

      if($request->file != null){
        $file = $request->file->getClientOriginalName();
        $request->file->move(public_path('storage/ticketing'), $file);
      }

      $ticket_msg = new TicketingMessage;
      $ticket_msg->message = $request->message;
      if($request->file != null){
      $ticket_msg->file = $file;
      }
      $ticket_msg->ticketing_id = $id;
      $ticket_msg->user_id = $user_id;
      $save2 = $ticket_msg->save();

      if($save2){
          Alert::success('Berhasil', 'Tiket Berhasil Dibalas');
          return redirect()->back();
      } else {
          Alert::error('Gagal', 'Gagal Membalas Tiket! Silahkan ulangi beberapa saat lagi');
          return redirect()->back();
      }
    }

    public function finish($idEn)
    {
      $id=Crypt::decrypt($idEn);
      $ticket = Ticketing::findOrFail($id);
      $ticket->update([
            'is_finished'   => TRUE
        ]);

      Alert::success('Berhasil', 'Tiket Sudah Selesai');
      return redirect()->route('adminticketindex');
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
    public function destroy($idEn)
    {
      $id=Crypt::decrypt($idEn);
      $ticket = Ticketing::findOrFail($id);
      $ticket->update([
            'is_deleted'   => TRUE
        ]);
      Alert::success('Berhasil', 'Tiket Sudah Dihapus');
      return redirect()->back();
    }
}
