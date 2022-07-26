<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => "required",
            "email" => ["required", "email",],
            "password" => ["required", "confirmed", "min:6"]
        ]);
        $formFields["password"] = bcrypt($formFields["password"]);
        User::create($formFields);
        return redirect("/login")->with("success", "Created User");
    }
}
