<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:20'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','You have registrated successfuly');
        }else{
            return back()->with('fail','Something is wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:20'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginID', $user->id);
                return redirect('Profile');
            }else{
                return back()->with('fail','Password not matching');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
    }
    public function Profile(){
        $data = array();
        if(Session::has('loginID')){
            $data = User::where('id', '=', Session::get('loginID'))->first();
            $s =  "select u.id, u.name, u.email, u.surname, u.city_id, u.adressLine, u.gender, c.id, c.city, c.country_id, n.id, n.country_name from users u left join city c on u.city_id = c.id left join country n on c.country_id = n.id where u.id =" . $data->id;
            $results = \DB::select( $s );
            $results['Cities']=(new UserController)->getCities();
            $results['Countries']=(new UserController)->getCountries();
        }
        return view('Profile', compact('results'));
    }
    public function logout(){
        if(Session::has('loginID')){
            Session::pull('loginID');
            return redirect('login');
        }
    }
    
}
