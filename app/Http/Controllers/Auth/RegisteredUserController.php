<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Provinces;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Villages;
use App\Models\UserAddress;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $provinces = Provinces::all();
        return view('auth.register', [
          'provinces' => $provinces,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_number' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'village' => ['required'],
            'zip_code' => ['required']
        ]);

        $macAddr = exec('getmac');
        $ipAddr=\Request::ip();

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'id_number' => $request->id_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => FALSE,
            'is_operator' => FALSE,
            'is_guest' => TRUE,
            'mac_address' => $macAddr,
            'ip_address' => $ipAddr,
            'avatar_file' => "default.png",
            'is_deleted' => FALSE,
        ]);

        event(new Registered($user));

        $get_province = Provinces::where('code', $request->province)->first();
        $get_city = Cities::where('code', $request->city)->first();
        $get_district = Districts::where('code', $request->district)->first();
        $get_village = Villages::where('code', $request->village)->first();
        $get=User::where(['id_number' => $request->id_number, 'email' => $request->email])->first();

        $address = new UserAddress;
        $address->address = $request->address;
        $address->province = $get_province->name;
        $address->city = $get_city->name;
        $address->district = $get_district->name;
        $address->village = $get_village->name;
        $address->zip_code = $request->zip_code;
        $address->is_deleted = FALSE;
        $address->user_id = $get->id;
        $save = $address->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
