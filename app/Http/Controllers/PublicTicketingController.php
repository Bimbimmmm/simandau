<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Alert;
use App\Models\Ticketing;
use App\Models\TicketingMessage;

class PublicTicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $datas=Ticketing::where(['user_id' => $user_id, 'is_deleted' => FALSE])->get();
        return view('public/complaint/ticket/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public/complaint/ticket/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $rules = [
            'importance_level'      => 'required',
            'title'                 => 'required|min:5',
            'message'               => 'required',
            'file.*'                => 'mimes:pdf,png,jpg|max:2048'
        ];

        $messages = [
            'importance_level.required'  => 'Prioritas tiket wajib diisi',
            'title.required'             => 'Judul tiket wajib diisi',
            'title.min'                  => 'Judul tiket minimal 5 karakter',
            'message.required'           => 'Pesan wajib diisi',
            'file.mimes'                 => 'Surat wajib berekstensi .pdf, .png, atau .jpg'
          ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->file != null){
          $file = $request->file->getClientOriginalName();
          $request->file->move(public_path('storage/ticketing'), $file);
        }

        $characters = $request->title;
        $charactersLength = strlen($characters);
        $randomString  = '';
        for ($i = 0; $i < 7; $i++) {
        $randomString  .= $characters[rand(0, $charactersLength - 1)];
        }
        $string = strtoupper($randomString);
        $code = str_replace(' ', '', $string);

        $ticket = new Ticketing;
        $ticket->code = $code;
        $ticket->importance_level = $request->importance_level;
        $ticket->title = $request->title;
        $ticket->is_finished = FALSE;
        $ticket->user_id = $user_id;
        $ticket->is_deleted = FALSE;
        $save = $ticket->save();

        $get=Ticketing::where(['code' => $code, 'title' => $request->title])->first();

        $ticket_msg = new TicketingMessage;
        $ticket_msg->message = $request->message;
        if($request->file != null){
        $ticket_msg->file = $file;
        }
        $ticket_msg->ticketing_id = $get->id;
        $ticket_msg->user_id = $user_id;
        $save2 = $ticket_msg->save();

        if($save2){
            Alert::success('Berhasil', 'Tiket Berhasil Dibuat');
            return redirect()->route('publicticketing');
        } else {
            Alert::error('Gagal', 'Gagal Membuat Tiket! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('publicticketingcreate');
        }
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
        return view('public/complaint/ticket/show', compact('data', 'messages'));
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
