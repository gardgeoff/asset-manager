<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Mail\AssetNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreAssetRequest;

class AssetControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request(["search"]));
        $assets = Asset::sortable()->with("user")->filter(request(["search"]))->paginate(20);
        return view("admin.assets.index", [
            "assets" => $assets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.assets.create", ["users" => User::all(["name", "id"])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetRequest $request)
    {
        $user = "";
        if ($request->user_id) {
            $user = User::find($request->user_id)->name;
        }

        $formfields = $request->validated();

        Asset::create($formfields);
        $admins = User::select("email")->with("roles")->wherehas("roles", function ($q) {
            $q->where("name", "Admin");
        })->get();


        foreach ($admins as $admin) {
            Mail::to([$admin->email])->send(new AssetNotification([
                "title" => "A new asset has been added",
                "name" => $formfields["name"],
                "category" => $formfields["category"],
                "user" => $user,

            ]));
        }
        return redirect(route("admin.assets.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *``
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::get();
        $asset = Asset::find($id);
        return view("admin.assets.edit", [
            "asset" => $asset,
            "users" => $users
        ]);
        //
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
        $user = "";
        if ($request->user_id) {
            $user = User::find($request->user_id)->name;
        }
        $asset = Asset::find($id);
        if (!$asset) {
            $request->session()->flash("error", "User Does Not Exist");
            return redirect(route("admin.users.index"));
        }
        $asset->update($request->except(["_token"]));
        $admins = User::select("email")->with("roles")->wherehas("roles", function ($q) {
            $q->where("name", "Admin");
        })->get();


        foreach ($admins as $admin) {
            Mail::to([$admin->email])->send(new AssetNotification([
                "title" => "An asset has been edited",
                "id" => $asset->id,
                "name" => $request->name,
                "category" => $request->category,
                "user" => $user,

            ]));
        }
        $request->session()->flash("success", "Asset Edited");
        return redirect(route("admin.assets.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Asset::destroy($id);
        $admins = User::select("email")->with("roles")->wherehas("roles", function ($q) {
            $q->where("name", "Admin");
        })->get();
        foreach ($admins as $admin) {
            Mail::to([$admin->email])->send(new AssetNotification([
                "title" => "An asset has been deleted",
                "name" => $request->name,
                "category" => $request->category,
                "id" => $id
            ]));
        }
        $request->session()->flash("success", "Asset Deleted");
        return redirect(route("admin.assets.index"));
    }
}
