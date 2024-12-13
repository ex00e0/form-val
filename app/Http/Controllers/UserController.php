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
        $request->validate([
            "email_l" => "required|email",
            "password_l" => "required"
        ]);

        $crenditionals = [
            "email" => $request->email_l,
            "password" => $request->password_l,
        ];

        if (Auth::attempt($crenditionals)) {
            return redirect()->route('catalog');
        }

        return redirect()->back()->withErrors(["message" => "Неверный логин или пароль"]);
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


    $query18 = DB::table('products')->select('products.*')->orderBy('products.current_price', 'DESC')->limit(5);
    $query19 = DB::table('products')->select('products.*', 'count(order_products.product_id)')->join('order_products', 'products.id', '=', 'order_products.product_id')->groupBy('product.id')->having('count(order_products.product_id)', '=', 0);
    $query20 = DB::table('orders')->select((count(CASE
    WHEN created_at <= '2024-12-31' AND created_at >= '2024-12-01' THEN 1
    ELSE NULL
    END)) as 'december', 
    (count(CASE
    WHEN created_at <= '2024-11-30' AND created_at >= '2024-11-01' THEN 1
    ELSE NULL
    END)) as 'november',
    (count(CASE
    WHEN created_at <= '2024-10-31' AND created_at >= '2024-10-01' THEN 1
    ELSE NULL
    END)) as 'october', 
    (count(CASE
    WHEN created_at <= '2024-09-30' AND created_at >= '2024-09-01' THEN 1
    ELSE NULL
    END)) as 'september', 
    (count(CASE
    WHEN created_at <= '2024-08-31' AND created_at >= '2024-08-01' THEN 1
    ELSE NULL
    END)) as 'august', 
    (count(CASE
    WHEN created_at <= '2024-07-31' AND created_at >= '2024-07-01' THEN 1
    ELSE NULL
    END)) as 'july', 
    (count(CASE
    WHEN created_at <= '2024-06-30' AND created_at >= '2024-06-01' THEN 1
    ELSE NULL
    END)) as 'june', 
    (count(CASE
    WHEN created_at <= '2024-05-31' AND created_at >= '2024-05-01' THEN 1
    ELSE NULL
    END)) as 'may', 
    (count(CASE
    WHEN created_at <= '2024-05-31' AND created_at >= '2024-04-01' THEN 1
    ELSE NULL
    END)) as 'april', 
    (count(CASE
    WHEN created_at <= '2024-03-31' AND created_at >= '2024-03-01' THEN 1
    ELSE NULL
    END)) as 'march', 
    (count(CASE
    WHEN created_at <= '2024-02-29' AND created_at >= '2024-02-01' THEN 1
    ELSE NULL
    END)) as 'february', 
    (count(CASE
    WHEN created_at <= '2024-01-31' AND created_at >= '2024-01-01' THEN 1
    ELSE NULL
    END)) as 'january')->get();
    $query21 =  DB::table('orders')->select('avg()')->get();
}