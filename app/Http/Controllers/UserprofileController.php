<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Userprofile;

use App\Mail\ResetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_profile = User::where('id', $user->id)->get();
        $provinces = Province::all();
        return view('profile.index', compact('user','provinces','user_profile'));
    }

    public function getKota(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();

        $option = "<option>Pilih Kota...</option>";
        foreach ($regencies as $kota ) {
            $option.= "<option value='$kota->id'>$kota->name</option>";  
        }

        echo$option;
    }

    public function getKecamatan(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();

        $option = "<option>Pilih Kecamatan...</option>";
        foreach ($districts as $kecamatan ) {
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";  
        }

        echo $option;
    }

    public function getKelurahan(Request $request)
    {
        $village_id = $request->village_id;
        $villages = Village::where('district_id', $village_id)->get();

        $option = "<option>Pilih Kelurahan...</option>";
        foreach ($villages as $kelurahan ) {
            $option.= "<option value='$kelurahan->id'>$kelurahan->name</option>";  
        }

        echo $option;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'nik' => 'required', 
        //     'name' => 'required', 
        //     'email' => 'required', 
        //     'no_handphone' => 'required', 
        //     'jenkel' => 'required',
        //     'alamat' => 'required', 
        //     'rt' => 'required', 
        //     'rw' => 'required', 
        //     'kode_pos' => 'required', 
        //     'province_id' => 'required', 
        //     'regency_id' => 'required', 
        //     'village_id' => 'required', 
        //     'district_id' => 'required', 

        // ]);

        // User::create([
        //      'nik' => $request->nik, 
        //      'name' => $request->name,
        //      'email' => $request->email, 
        //      'no_handphone' => $request->no_handphone, 
        //      'jenkel' => $request->jenkel, 
        //      'alamat' => $request->alamat, 
        //      'rt' => $request->rt,
        //      'rw' => $request->rw, 
        //      'kode_pos' => $request->kode_pos,
        //      'province_id' => $request->province_id, 
        //      'regency_id' => $request->regency_id,
        //      'village_id' => $request->village_id, 
        //      'district_id' => $request->district_id,
        // ]);
        
        // return redirect()->route('user_profile');
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
        $user = User::where('id',$id)->first(); 
        return view('user_profile.edit', compact('user'));
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
            $user = User::find($id);
            //dd($user);
            $user->update([
                // dd($request)
                'nik'               => $request->nik == null ? $user->nik : $request->nik,
                'name'              => $request->name == null ? $user->name : $request->name,
                'email'             => $request->email == null ? $user->email : $request->email,	
                'no_handphone'      => $request->no_handphone == null ? $user->no_handphone : $request->no_handphone,
                // 'password'          => $request->password == null ? $user->password :  bcrypt($request->password),
                'jenkel'	        => $request->jenkel == null ? $user->jenkel : $request->jenkel,
                'alamat'            => $request->alamat == null ? $user->alamat : $request->alamat,
                'rt'                => $request->rt == null ? $user->rt : $request->rt,
                'rw'                => $request->rw == null ? $user->rw : $request->rw,
                'kode_pos'          => $request->kode_pos == null ? $user->kode_pos : $request->kode_pos,	
                'province_id'       => $request->province_id == null ? $user->province_id : $request->province_id,	
                'regency_id'        => $request->regency_id == null ? $user->regency_id : $request->regency_id ,	
                'village_id'        => $request->village_id == null ? $user->village_id : $request->village_id ,	
                'district_id'       => $request->district_id == null ? $user->district_id : $request->district_id,
                // 'role'              => $request->role == null ? $user->role : $request->role,
               /*  'foto'              => $imgName */
            ]);
    
            return redirect(route('user_profile'))->with('success', 'Data Berhasil Diedit'); 
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

    public function showLinkRequestForm(){
        return view('resetemail');
    }

    public function sendResetLinkEmail(Request $request){
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email','max:255'],
        ]);

        $verify = User::where('email', $request->all()['email'])->exists();

        if ($verify) {
            $verify2 = DB::table('password_resets')->where([
                ['email', $request->all()['email']]
            ]);

            if ($verify2->exists()) {
                $verify2->delete();
            }
            $token = Str::random(64);

            $password_reset = DB::table('password_resets')->insert([
                'email' => $request->all()['email'], 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);

            if ($password_reset) {
                Mail::to($request->all()['email'])->send(new ResetPassword(['token'=> $token]));
                return redirect('login')->with('success', 'Silahkan cek alamat Anda untuk mereset kata sandi Anda');
            }
        } else {
            return back()->with('error', 'This email does not exist');
        }
    }
    public function showResetForm($token)
    {
       return view('emails.forget-password-email', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users', 
            'password' => 'required|string|min:6|confirmed', 
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email, 
            'token' => $request->token
        ])->first();
    if (!$updatePassword) {
        return back()->withInput()->with('error', 'Invalid token');
    }
    $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect('/login')->with('success', 'Your password has been changed!');
    }
}

