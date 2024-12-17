<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index () {
        return view('index');
    }
    public function catalog () {
        return view('catalog');
    }
    public function signin(Request $request)
    {
        $data = [
             "email_l" => $request->email_l,
            "password_l" => $request->password_l
        ];
        $rules = [
            "email_l" => "required|email",
            "password_l" => "required"
        ];
        $messages = [
            'email_l.required'=>'Заполните почту',
            'email_l.email'=>'Проверьте введенную почту',
            
            'password_l.required'=>'Заполните пароль',
        ];
        $validate = Validator::make($data, $rules, $messages);
        if($validate->fails()){
            return redirect()->back()
            ->withErrors($validate)
            ->withInput();
        }
        else{
            $crenditionals = [
                "email" => $request->email_l,
                "password" => $request->password_l,
            ];
    
            if (Auth::attempt($crenditionals)) {
                return redirect()->route('catalog');
            }
            else {
                return redirect()->back()->withErrors(["message" => "Неверный логин или пароль"]);
            }
        }
        
    }
    public function signup(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        $rules = [
            'name'=>'required|min:6',
            'email'=>'required|min:6|email|unique:users',
            'password'=>'required|regex:/^[a-zA-Z0-9_]+$/|min:6'
        ];
        $messages = [
            'name.required'=>'Заполните имя',
            'name.min'=>'Минимальная длина имени - 6 символов',
            'email.required'=>'Заполните почту',
            'email.min'=>'Минимальная длина почты - 6 символов',
            'email.email'=>'Проверьте введенную почту',
            'email.unique'=>'Пользователь с такой почтой существует!',
            'password.required'=>'Заполните пароль',
            'password.min'=>'Минимальная длина пароля- 6 символов',
            'password.regex'=>'Пароль может содержать только латиницу, цифры и символ нижнего подчеркивания'
        ];
        $validate = Validator::make($data, $rules, $messages);
        if($validate->fails()){
            return redirect()->back()
            ->withErrors($validate)
            ->withInput();
        }
        else{
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
            Auth::login($user);
            return redirect()->route('catalog');
        }


    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }


    
}