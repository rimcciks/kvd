<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function editProfile()
    {
        //Datu nolasīšana no datubāzes
        $data = array();
        if(Session::has('loginID'))
        {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            $s =  "select u.id, u.name, u.email, u.surname, u.city_id, u.adressLine, u.gender, c.id, c.city, c.country_id, n.id, n.country_name from users u left join city c on u.city_id = c.id left join country n on c.country_id = n.id where u.id =" . $data->id;
            $results = \DB::select( $s );
            //$this->getCities();
            //$this->getCountries();
            //$user_id=$data[id];
            $results['Cities']=$this->getCities();
            $results['Countries']=$this->getCountries();
            //print_r($results);
            //echo "{{$data->id}}";
            //print_r($results[0]->name);
            //print_r($data);
            return view("editProfile", compact('results'));
            //atgriež rediģēšanas skatu
        }
        else
        {
            return back()->with('fail','Something is wrong');
            //atgriež profila skatu
        }
        
    }
    public function getCities()
    {
        //pārbauda lietotājam eksistē aktīva sesija
        if(Session::has('loginID'))
        {
            //atlasa datus
            $c =  "select id, city, country_id from city";
            $Cities = \DB::select( $c );
            //print_r($results);
            //print_r($results[0]->name);
            //echo "{{$data->id}}";
            
        }
        return $Cities;
    }
    public function getCountries()
    {
        //pārbauda lietotājam eksistē aktīva sesija
        if(Session::has('loginID'))
        {
            //atlasa datus
            $n =  "select id, country_name from country";
            $Countries = \DB::select( $n );
            //print_r($results);
            //print_r($results[0]->name);
            //echo "{{$data->id}}";
            
        }
        return $Countries;
    }
    public function Profile()
    {
        return "profile";
        //atgriež profila skatu
    }
    public function updateUser(Request $request)
    {
        
        //echo "test";
        //print_r($request);
        //datu validācija
        $request->validate([
            'name'=>'required|max:30',
            'surname'=>'required|max:20'
            //'surname'=>'required'  
        ]);
        
        //return redirect('dashboard');
        //echo "test";
         // iegūst lietotāja datus
         $res = DB::table('users')->where('id', '=', Session::get('loginID'))->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'city_id' => (int) $request->city,
            'adressLine' => $request->adress_line,
            'gender' => $request->gender
        ]);
        
        return redirect('Profile');
    }
    
}
