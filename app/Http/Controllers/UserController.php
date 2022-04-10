<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->User = new User();
    }

    public function updatePassword(Request $request,$id){
        $validator = Validator::make($request->all(), [
          'password' => 'required|confirmed|min:8',
      ],[
        'password.required'=>'Password Harus Diisi',
        'password.confirmed'=>'Konfirmasi password tidak sesuai',
      ]);
      $data = [
              'password' => Hash::make(Request()->password),
              'updated_at'      => \Carbon\Carbon::now()
          ];
          if($validator->fails()){
            Alert::error('Error', 'Password Gagal Diubah');
            return redirect()->route('home')->withErrors($validator)->withInput();
          }
          $this->User->updateData($id,$data);
          Alert::success('Success', 'Password Berhasil Diubah');
          return redirect()->route('home');
      }

      public function updateMembership(Request $request,$id){
        $validator = Validator::make($request->all(), [
          'membership' => 'required',
      ],[
        'membership.required'=>'Harus Diisi',
      ]);
      $data = [
              'membership' => Request()->membership,
              'updated_at'      => \Carbon\Carbon::now()
          ];
          if($validator->fails()){
            Alert::error('Error', 'Gagal Diubah');
            return redirect()->route('home')->withErrors($validator)->withInput();
          }
          $this->User->updateData($id,$data);
          Alert::success('Success', 'Berhasil Diubah');
          return redirect()->route('home');
      }
}
