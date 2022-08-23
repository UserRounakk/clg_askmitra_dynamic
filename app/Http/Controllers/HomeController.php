<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Organizer;
use App\Models\Resources;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.pages.dashboard');
    }
    public function home()
    {
        $resources = Resources::all();
        $categories = Category::all();
        $cards = Card::all();
        $faqs = Faq::all();
        $organizers = Organizer::all();
        return view('frontend.index',compact("resources","categories","cards", "faqs","organizers"));
    }
}
