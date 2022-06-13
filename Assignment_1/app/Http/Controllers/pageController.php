<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class pageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    

    public function registration()
    {
        return view('pages.registration');
    }

    public function login()
    {
        return view('pages.login');
    }

    public  function createSubmit(Request $req){

        //$req->validate([],[]);
        $this->validate($req,
             [
                "name"=>"required|regex:/^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$/u|max:25",
               "id"=>"required|regex:/^([0-5]{3}-[0-9]{2}-[1-3]{2})+$/i",
                "dob"=>"required|date|before:-18 years",
                "email"=>'required|email|regex:/^([0-9]{2}-[0-9]{5}-[1-3]{1})@student\.aiub\.edu/',
                "phone"=>"required|regex:/^([0]{1}[1]{1}[0-9]{9})+$/i",
                "password"=>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                "conf_password"=>"required|same:password"
             ],
             [
                 "name.required"=> "Please provide your name",
                 "name.max"=> "Name should not exceed 10 characters",
                 "dob.before" => "You Must Be At least 18 Years Old, Before You Register To This Website",
                 "password.regex"=>"Password must contain upper case, lower case, number and special
                 characters, minimum length 8",
                 "conf_password.same"=>"The password does not match !"
             ]
            );

            $newUser = new User();
            $newUser->name = $req->name;
            $newUser->email= $req->email;
            $newUser->password = $req->password;
            $newUser->save();

        return view('pages.login');
    
    
}
    public function userInfo()
    {
        $users = User::all();
        return view('pages.dashboard')->with('info',$users);
    }

    public function userProfile($id,$name,$email,$created_at)
    {
        return view('pages.profile')
        ->with('id',$id)
        ->with('name',$name)
        ->with('email',$email)
        ->with('created_at',$created_at);
        
    }
    public function loginAuth(Request $req)
    {
        $users = User::where('email','=',$req->email)->first();

        if($users->password == $req->password && $users->type == "admin")
        {
            $users = User::all();
            return view('pages.adminPanel')->with('info',$users);
        }

        if($users->password == $req->password)
        {
            $users = User::all();
            return view('pages.dashboard')->with('info',$users);
        }
        else{
            echo '<h5 class="text-danger">you are not a registerd user. Please register first</h5>';
            return view('pages.login');
        }
        
    }
}
