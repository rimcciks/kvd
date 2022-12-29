<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function editProfile(){
        $data = array();
        if(Session::has('loginID')){
            $data = User::where('id', '=', Session::get('loginID'))->first();
            $s =  "select u.id, u.name, u.email, u.surname, u.city_id, u.adressLine, u.gender, c.id, c.city, c.country_id, n.id, n.country_name from users u left join city c on u.city_id = c.id left join country n on c.country_id = n.id where u.id =" . $data->id;
            $results = \DB::select( $s );
            //$this->getCities();
            //$this->getCountries();
            $results['Cities']=$this->getCities();
            $results['Countries']=$this->getCountries();
            //print_r($results);
            //echo "{{$data->id}}";
            //print_r($results[0]->name);
            //print_r($data);
            
        }
        return view("editProfile", compact('results'));
    }
    public function getCities(){
        if(Session::has('loginID')){
            
            $c =  "select id, city, country_id from city";
            $Cities = \DB::select( $c );
            //print_r($results);
            //print_r($results[0]->name);
            //echo "{{$data->id}}";
            
        }
        return $Cities;
    }
    public function getCountries(){
        if(Session::has('loginID')){
            
            $n =  "select id, country_name from country";
            $Countries = \DB::select( $n );
            //print_r($results);
            //print_r($results[0]->name);
            //echo "{{$data->id}}";
            
        }
        return $Countries;
    }
    public function Profile(){
        return "profile";
        //return view("auth.login");
    }
    public function updateUser(Request $request){
        /*echo "test";
        //print_r($request);
        $request->validate([
            'name'=>'required',
            //'surname'=>'required'  
        ]);
        $user->name = $request->name;
        //$user->surname = $request->surname;
        $res = $user->save();
        /*if($res){
            return back()->with('success','Changes have been saved');
        }else{
            return back()->with('fail','Something is wrong');
        }*/
        //return redirect('dashboard');*/
        echo "test";
         // Removed the type-hinted User model instance
        DB::table('users')->update([
            'name' => $request->name,
            'surname' => $request->surname
        ]);
    }
}