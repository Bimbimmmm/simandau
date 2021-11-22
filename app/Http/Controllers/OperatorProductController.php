<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Alert;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\SchoolOperator;
use App\Models\ReferenceSchool;
use App\Models\BankAccount;

class OperatorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $datas=Products::where(['user_id' => $user_id, 'is_deleted' => FALSE])->get();
        $count=Products::where(['user_id' => $user_id, 'is_deleted' => FALSE])->count();
        $check=BankAccount::where(['user_id' => $user_id, 'is_deleted' => FALSE])->count();
        return view('operator/product/index', compact('datas' , 'count', 'check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator/product/add');
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
        $school_operator=SchoolOperator::where('user_id', $user_id)->first();
        $ref=ReferenceSchool::where('id', $school_operator->school_id)->first();

        $rules = [
            'name'                  => 'required|min:3|max:35|unique:product,name',
            'description'           => 'required|min:3',
            'price'                 => 'required',
            'stock'                 => 'required|min:1',
            'weight'                => 'required',
            'file'                  => 'required|array',
            'file.*'                => 'image|mimes:png,jpg|max:2048'
        ];

        $messages = [
            'name.required'         => 'Nama produk wajib diisi',
            'name.min'              => 'Nama produk minimal 3 karakter',
            'name.max'              => 'Nama produk maksimal 35 karakter',
            'name.unique'           => 'Nama produk sudah terdaftar',
            'description.required'  => 'Deskripsi produk wajib diisi',
            'description.min'       => 'Nama produk minimal 3 karakter',
            'price.required'        => 'Harga produk wajib diisi',
            'stock.required'        => 'Stok produk wajib diisi',
            'stock.min'             => 'Stok produk minimal 1',
            'weight.required'       => 'Berat produk wajib diisi',
            'file.mimes'            => 'Foto Produk wajib berekstensi .png atau .jpg',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $product = new Products;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->is_available = TRUE;
        $product->is_deleted = FALSE;
        $product->user_id = $user_id;
        $product->school_operator_id = $school_operator->id;
        $product->reference_school_type_id = $ref->reference_school_type_id;
        $save = $product->save();

        $get_product_id=Products::where('name', $request->name)->first();

        $count = count($request->file);
        for ($i=0; $i < $count; $i++) {
          $product_image = new ProductImage;
          $file = $request->file[$i]->getClientOriginalName();;
          $request->file[$i]->move(public_path('storage/product'), $file);
          $product_image->product_id = $get_product_id->id;
          $product_image->file = $file;
          $save2 = $product_image->save();
        }

        if($save2){
            Alert::success('Berhasil', 'Produk Berhasil Ditambahkan');
            return redirect()->route('operatorproductindex');
        } else {
            Alert::error('Gagal', 'Gagal Menambahkan Produk! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('operatorproductadd');
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
