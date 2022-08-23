<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.pages.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resources = Resources::all();
        return view("admin.pages.categories.create",compact("resources"));
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
            'title' => 'required',
            'resource_id' => 'required',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->resource_id = $request->resource_id;
        $category->resource = Resources::find($request->resource_id)->title;
        $category->save();
        File::makeDirectory(public_path('Images/' . Resources::find($request->resource_id)->slug ."/". Str::slug($request->title)), $mode = 0777, true, true);
        return redirect("/categories")->with("msg","Category Created successfully.");
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
        $category = Category::find($id);
        $resources = Resources::all();
        return view("admin.pages.categories.edit",compact("category","resources"));
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
            'title' => 'required',
            'resource_id' => 'required',
        ]);

        $category = Category::find($id);
        $category->title = $request->title;
        $category->resource_id = $request->resource_id;
        $category->resource = Resources::find($request->resource_id)->title;
        $category->update();
        File::makeDirectory(public_path('Images/' . Resources::find($request->resource_id)->slug. "/" . Str::slug($request->title)), $mode = 0777, true, true);
        return redirect("/categories")->with("msg","Category Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        File::deleteDirectory(public_path('Images/' . Resources::find($data->resource_id)->slug . "/" . Str::slug($data->title)));
        $data->delete();
        return redirect()->back()->with('msg', 'Deleted Succesfully');
    }
}
