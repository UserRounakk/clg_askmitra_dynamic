<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        $resources = Resources::all();
        $categories = Category::all();

        return view("admin.pages.cards.index",compact("cards","resources","categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $resources = Resources::all();
        return view("admin.pages/cards.create",compact("categories","resources"));
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
            'subtitle' => 'required',
            "url"=>"required|url",
            "resource_id"=>"required",
            "category_id"=>"required",
            "image"=>"required"
        ]);

        $card = new Card();
        $card->title = $request->title;
        $card->subtitle = $request->subtitle;
        $card->url = $request->url;
        $card->resource_id = $request->resource_id;
        $card->category_id = $request->category_id;
        if($request->is_tool){
            $card->is_tool = true;
        };
        if($request->hasFile("image")){

            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($request->title).".".$extension;
            $path = "images/". Resources::find($request->resource_id)->slug."/". Str::slug(Category::find($request->category_id)->title)."/";
            $file->move($path,$filename);

            $card->image = $path.$filename;
        }
        $card->save();

        return redirect("/cards")->with("msg","Card Added Successfully.");


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
        $card = Card::find($id);
        $resources = Resources::all();
        $categories = Category::all();

        return view("admin.pages.cards.edit",compact("card","resources","categories"));
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
            'subtitle' => 'required',
            "url" => "required|url",
            "resource_id" => "required",
            "category_id" => "required",
        ]);

        $card = Card::find($id);
        $card->title = $request->title;
        $card->subtitle = $request->subtitle;
        $card->url = $request->url;
        $card->resource_id = $request->resource_id;
        $card->category_id = $request->category_id;
        if ($request->is_tool) {
            $card->is_tool = true;
        }else{
            $card->is_tool = false;
        }
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($request->title) . "." . $extension;
            $path = "images/" . Resources::find($request->resource_id)->slug . "/" . Str::slug(Category::find($request->category_id)->title) . "/";
            $file->move($path, $filename);

            $card->image = $path . $filename;
        }
        $card->update();

        return redirect("/cards")->with("msg", "Card Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Card::find($id);
        unlink($data->image);
        $data->delete();
        return redirect()->back()->with('msg', 'Deleted Succesfully');
    }
}
