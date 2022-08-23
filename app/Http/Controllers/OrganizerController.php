<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizers = Organizer::all();
        return view("admin.pages.organizers.index",compact("organizers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.organizers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name"=> "required",
            "url"=>"required",
            "image"=>"required"
        ]);

        $organizer = new Organizer();
        $organizer->name = $request->name;
        $organizer->url = $request->url;
        if($request->hasFile("image")){
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($request->name).".".$extension;
            $path = "images/organizers/";
            $file->move($path,$filename);
            $organizer->image = $path.$filename;
        }
        $organizer->save();
        return redirect("/organizers")->with("msg","Organizer added successfully.");

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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organizer = Organizer::find($id);
        return view("admin.pages.organizers.edit",compact("organizer"));
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
        $validated = $request->validate([
            "name" => "required",
            "url" => "required",
        ]);

        $organizer = Organizer::find($id);
        $organizer->name = $request->name;
        $organizer->url = $request->url;
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($request->name) . "." . $extension;
            $path = "images/organizers/";
            $file->move($path, $filename);
            $organizer->image = $path . $filename;
        }
        $organizer->update();
        return redirect("/organizers")->with("msg", "Organizer updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Organizer::find($id);
        unlink($data->image);
        $data->delete();
        return redirect()->back()->with('msg', 'Deleted Succesfully');
    }
}
