<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Validator;
use App\Models\ReferenceSchool;
use App\Models\ReferenceSchoolType;
use App\Models\Provinces;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Villages;

class ReferenceSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ReferenceSchool::where('is_deleted' => FALSE)->get();
        return view('administrator/references/school/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces=Provinces::all();
        $types=ReferenceSchoolType::all();
        return view('administrator/references/school/add', compact('provinces', 'types'));
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
            'school_name'               => 'required|min:3',
            'address'                   => 'required',
            'province'                  => 'required',
            'city'                      => 'required',
            'district'                  => 'required',
            'village'                   => 'required',
            'reference_school_type_id'  => 'required'
        ];

        $messages = [
            'school_name.required'               => 'Nama sekolah wajib diisi',
            'school_name.min'                    => 'Nama sekolah minimal 3 karakter',
            'address.required'                   => 'Alamat wajib diisi',
            'province.required'                  => 'Provinsi wajib diisi',
            'city.required'                      => 'Kota wajib diisi',
            'district.required'                  => 'Kecamatan wajib diisi',
            'village.required'                   => 'Kelurahan / Desa wajib diisi',
            'reference_school_type_id.required'  => 'Tipe Sekolah wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $get_province = Provinces::where('code', $request->province)->first();
        $get_city = Cities::where('code', $request->city)->first();
        $get_district = Districts::where('code', $request->district)->first();
        $get_village = Villages::where('code', $request->village)->first();

        $school = new ReferenceSchool;
        $school->school_name = $request->school_name;
        $school->address = $request->address;
        $school->province = $get_province->name;
        $school->city = $get_city->name;
        $school->district = $get_district->name;
        $school->village = $get_village->name;
        $school->reference_school_type_id = $request->reference_school_type_id;
        $school->is_deleted = FALSE;
        $save = $school->save();

        if($save){
            Alert::success('Berhasil', 'Sekolah Berhasil Ditambahkan');
            return redirect()->route('adminrefschool');
        } else {
            Alert::error('Gagal', 'Gagal Menambahkan Sekolah! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('adminrefschool');
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
      $school = ReferenceSchool::findOrFail($id);
      $school->update([
            'is_deleted'   => TRUE
        ]);
      Alert::success('Berhasil', 'Sekolah Berhasil Dihapus');
      return redirect()->back();
    }
}
