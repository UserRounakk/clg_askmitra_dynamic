<?php

namespace App\Http\Controllers;

use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resources::all();
        return view("admin.pages.resources.index",compact("resources"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.resources.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);
        $title = $request->title;
        $slug =  join("-",explode(" ", strtolower($title)));

        $resource = new Resources();
        $resource->title = $request->title;
        $resource->slug = Str::slug($resource->title);
        $resource->save();
        File::makeDirectory(public_path('Images/' . $resource->slug), $mode = 0777, true, true);
        return redirect()->back()->with("msg","Resource created Successfully.");
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
    public function edit($slug)
    {
        $resource = Resources::where("slug",$slug)->first();
        // dd($resource);
        return view("admin.pages.resources.create",compact("resource"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $resource = Resources::where("slug",$slug)->first();
        $resource->title = $request->title;
        $resource->update();
        return redirect("/resources")->with("msg","Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Resources::find($id);
        File::deleteDirectory(public_path('Images/' . $data->slug));
        $data->delete();
        return redirect()->back()->with('msg', 'Deleted Succesfully');
    }
}
