<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view("users.login");
    }
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);
        if (auth()->attempt($formFields)) {

            $request->session()->regenerate();
            return redirect("/")->with("success", "Login Success");
        } else {
            return back()->withErrors(["email" => "Invalid Credentials"]);
        }
    }
    public function create()
    {
        return view("users.register");
    }
    public function store(StoreUserRequest $request)
    {
        $formFields = $request->validated();

        User::create($formFields);
        return redirect("/login")->with("success", "Created User");
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login")->with("success", "Logged out Succesfully");
    }
}