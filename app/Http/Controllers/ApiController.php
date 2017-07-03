<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\ProtoBuff\Person;

class ApiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('ApiAuth');
        $this->middleware('cors');
    }
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
    {

        // get_class_methods('Person');
        
        \Log::info('This is some useful information.');
        $dadsa = new \Person();
        if($request->input('username'))
        {

            if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password')])){
                //get all users
                $users = User::where('role',Auth::user()->role)->get();

                $res = "";
                foreach($users as $r){

                    $res = $res . $r->email . ",";
                }
                $dadsa->setName($res);
                \Log::info($res);
            }
            else
                $dadsa->setName("wrong email / password");
        }
        else
            $dadsa->setName('request was wrong');


        // dd($dadsa->getName());
        // $dadsa = new \Human();$dadsa->getName()[] = 1;
        // dd($dadsa);
        // $arr = ["a","b","c"];
        // $dadsa->setName($arr);
        // dd($dadsa->getName()[0]);
        // return response($dadsa->serializeToString())->header('content-type','application/x-protobuf');
        // dd($dadsa->serializeToString());
        // dd(unpack('C*',$dadsa->serializeToString()));
        return response($dadsa->serializeToString())->header('content-type','binary/octet-stream');
        
        // return view('home', ['user' => $request->get('user')]); 
    }
    public function testresponse(Request $request){
        dd($request->input('protobuff'));
        $dadsa = new \Person();
        try {

            $dadsa->mergeFromString($request->input('protobuff'));
            
            dd($dadsa);
        } catch (Exception $e){
            // dd("bad");
            dd($e);
        }
    }
}