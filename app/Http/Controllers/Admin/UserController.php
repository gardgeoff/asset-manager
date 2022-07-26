<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = User::filter(request(["search"]))->paginate(10);
        return view("admin.users.index", [
            "users" => $users
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create", ["roles" => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $formFields = $request->validated();
        $user = User::create($formFields);
        $user->roles()->sync($request->roles);
        $request->session()->flash("success", "User Created");
        return redirect((route("admin.users.index")));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
   
        $assets = Asset::where("user_id", $id)->paginate(10);
        return view("admin.users.show", ["user" => $user, "assets" => $assets]);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view("admin.users.edit", [
            "roles" => Role::all(),
            "user" => User::find($id)
        ],);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            $request->session()->flash("error", "User Does Not Exist");
            return redirect(route("admin.users.index"));
        }
        $user->update($request->except(["_token", "roles"]));
        $user->roles()->sync($request->roles);
        $request->session()->flash("success", "User Edited");
        return redirect(route("admin.users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        User::destroy($id);
        $request->session()->flash("success", "User Deleted");
        return redirect(route("admin.users.index"));
    }
}