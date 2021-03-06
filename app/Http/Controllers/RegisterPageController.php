<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\Session;

class RegisterPageController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function doRegister(Request $request){

        $this->validate($request, [
            'username'              => 'required|Unique:users|Between:5,20|AlphaNum',
            'postcode'              => array(
                'regex:/^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|
                                        (290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$/'),
            'email'                 =>'required|Unique:users|between:5,50',
            'password'              => array( 'required','Between:6,20','Confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'),
            'password_confirmation' => array( 'required','Between:6,20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'),
            'firstname'             => 'required|Alpha|max:20',
            'lastname'              => 'required|Alpha|max:20'
        ]);
//        $allRequest = $request->all();
        $user = new User;
        $firstname =Input::get('firstname');
        $lastname = Input::get('lastname');
        $user->name = $firstname." ".$lastname;
        $user->username = Input::get('username');
        $user->postcode = Input::get('postcode');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->isAdmin = 0;
        $user->isRecord = 0;
        $user->save();



//        $request->session()->put('ChooseFiles', $choose_files);
        $request->session()->put('user', $user);

//        $userName = Input::get('username');
        return view('successfulRegister');
    }

//    public function storeFile(request $request){
//
//        if($request->hasFile('file')){
//
//
//            $filename = $request->file->getClientOriginalName();
//
//            $filesize = $request->file->getClientSize();
//
//            $request->file->storeAs('public/upload',$filename);
//
//            $file = new ChooseFiles;
//
//            $file->name = $filename;
//
//            $file->size = $filesize;
//
//            $file->save();
//            return 'yes';
//
//            return redirect()->route('register') ->with('Success','license uploaded successfully');
//        }
//        return $request->all();
//    }


//    public function storeFile(requset $request){
////
//
//    if($request->hasFile('register')){
//        $request->register->store('public/upload');
////            $filename = $request->file->getClientOriginalName();
////            $filesize = $request->file->getClientSize();
////        $request->file->storeAs('public/upload',$filename);
////            $choose_files = new File;
////            $choose_files->name = $filename;
////            $choose_files->size = $filesize;
////            $choose_files->save();
//        return 'yes';
//    }
//        return $request->all();
//}

}