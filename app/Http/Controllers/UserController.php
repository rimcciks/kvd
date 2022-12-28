<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function edit(){
        $data = array();
        if(Session::has('loginID')){
            $data = User::where('id', '=', Session::get('loginID'))->first();
            $s =  "select u.id, u.name, u.email, u.surname, u.city_id, c.id, c.city, c.country_id, n.id, n.country_name from users u left join city c on u.city_id = c.id left join country n on c.country_id = n.id where u.id =" . $data->id;
            $results = \DB::select( $s );
            print_r($results);
            echo "{{$data->id}}";
        }
        return view("editProfile", compact('data'));
    }
}
