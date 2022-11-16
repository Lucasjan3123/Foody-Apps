<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\kategori;

class UserController extends Controller
{
    

    public function indexAdmin(){
        $kategori = kategori::all();
        return view('admin.daftarKategori', ['kategori' => $kategori]);
    }
    public function indexUser(){
        $users = User::get();
        return view('admin.daftarUser',compact('users'));
    }

    public function editProfile($id){
        $user = User::find($id);
        $profile = Profile::where('user_id',$id)->first();
        return view('user.profile',[
            'user'=>$user,
            'no_telpon' => $profile->no_telpon,
            'jenisKelamin' =>$profile->jenisKelamin,
            'alamat' =>$profile->alamat,
            'foto' =>$profile->foto,
        ]);
    }
    public function updateUserProfile(Request $request, $id){
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'required',
            'address' => 'required',
            'jenis_kelamin' => 'required',
            'foto_profile' => 'image|mimes:jpg,png,jpeg',
        ]);
        User::where('id',$id)->update([
            'name' => $request['nama'],
            'email' => $request['email'],
        ]);
        
        Profile::where('user_id',Auth::user()->id)->update([
            'no_telpon' => $request['no_hp'],
            'alamat' => $request['address'],
            'jenisKelamin' => $request['jenis_kelamin'],
            
        ]);
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $nama_foto = $profile->foto;
          
        if ($request->has('foto_profile')) {
            if($nama_foto == "Logo_user.png"){
                
                // dd($profile->foto);
            $filename = time().'.'.$request->foto_profile->extension();
            $request->foto_profile->move(public_path('image'),$filename);
            $profile->foto = $filename;
            $profile->save();

            }else{
                $path = 'image/';
                File::delete($path. $profile->foto);
                $filename = time().'.'.$request->foto_profile->extension();
                $request->foto_profile->move(public_path('image'),$filename);
                
                $profile->foto = $filename;
                $profile->save();
            }
        }
        return redirect()->route('profile.edit',$id);
        
    }

    public function editUser($id){
        $user = User::find($id);
        $profile = Profile::where('user_id',$id)->first();
        return view('admin.editRole',[
            'user'=>$user,
            'no_telpon' =>$profile->no_telpon,
            'jenisKelamin' =>$profile->jenisKelamin,
            'alamat' =>$profile->alamat,
        ]);
        // return view('admin.editRole',compact('user'));
    }

    public function updateUserRole(Request $request, $id){
        $request->validate([
            'role'=>'required'
        ]);
        User::where('id', $id)->update([
        'role' => $request['role'],]);
        return redirect('/user');
    }

    public function destroy($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect('/user');
    }
}
