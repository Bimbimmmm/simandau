<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsComment;
use Validator;
use Alert;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = News::where('is_deleted', FALSE)->get();
        return view('administrator/news/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator/news/add');
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
            'title'                 => 'required|min:3|max:200|unique:news,title',
            'content'               => 'required|min:35',
            'header_image'          => 'required',
            'header_image.*'        => 'image|mimes:png,jpg|max:2048',
            'content_image.*'       => 'image|mimes:png,jpg|max:2048',
            'author'                => 'required'
        ];

        $messages = [
            'title.required'        => 'Judul Berita wajib diisi',
            'title.min'             => 'Judul Berita minimal 3 karakter',
            'title.max'             => 'Judul Berita maksimal 200 karakter',
            'title.unique'          => 'Judul Berita sudah pernah dibuat',
            'content.required'      => 'Isi Berita wajib diisi',
            'content.min'           => 'Isi Berita minimal 35 karakter',
            'header_image.required' => 'Foto Header wajib diisi',
            'header_image.mimes'    => 'Foto Header wajib berekstensi .png atau .jpg',
            'content_image.mimes'   => 'Foto Konten wajib berekstensi .png atau .jpg',
            'author.required'       => 'Nama penulis wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $header_image = $request->header_image->getClientOriginalName();
        $request->header_image->move(public_path('storage/news'), $header_image);

        if($request->content_image != null){
          $content_image = $request->content_image->getClientOriginalName();
          $request->content_image->move(public_path('storage/news'), $content_image);
        }else{
          $content_image = null;
        }

        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->header_image = $header_image;
        $news->content_image = $content_image;
        $news->author = $request->author;
        $news->is_deleted = FALSE;
        $save = $news->save();

        if($save){
            Alert::success('Berhasil', 'Berita Berhasil Dibuat');
            return redirect()->route('adminnewsindex');
        } else {
            Alert::error('Gagal', 'Gagal Membuat Berita! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('adminnewscreate');
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
      $news=News::where('id', $id)->first();
      $comments=NewsComment::where('news_id', $id)->get();
      return view('administrator/news/view', compact('news', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $news=News::where('id', $id)->first();
      return view('administrator/news/edit', compact('news'));
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
      $news = News::findOrFail($id);
      $news->update([
            'is_deleted'   => TRUE
        ]);
      return redirect()->back();
    }

    public function destroycomment($id)
    {
      $delete = NewsComment::findOrFail($id);
      $delete->delete();
      return redirect()->back();
    }
}
