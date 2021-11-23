<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Alert;
use App\Models\News;
use App\Models\NewsComment;

class PublicNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newss=News::where('is_deleted', FALSE)->latest()->get();
        return view('public/news/index', compact('newss'));
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
        $rules = [
            'comment'               => 'required|min:3'
        ];

        $messages = [
            'comment.required'      => 'Komentar wajib diisi',
            'comment.min'           => 'Komentar minimal 3 karakter'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $news_id=Crypt::decrypt($request->idEn);
        $user_id = auth()->user()->id;

        $comment = new NewsComment;
        $comment->news_id = $news_id;
        $comment->user_id = $user_id;
        $comment->comment = $request->comment;
        $save = $comment->save();

        if($save){
            Alert::success('Berhasil', 'Komentar Berhasil Diambahkan');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Gagal Menambahkan Komentar! Silahkan ulangi beberapa saat lagi');
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
        $data=News::where('id', $id)->first();
        $newss=News::where('is_deleted', FALSE)->latest()->take(4)->->get();
        $comments=NewsComment::where('news_id', $id)->get();
        return view('public/news/view', compact('data', 'comments', 'newss'));
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
