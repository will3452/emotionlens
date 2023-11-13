<?php

namespace App\Http\Controllers;

use App\Models\Subject;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $q = $request->search ?? ''; 

        $subjects = Subject::where('subject', 'LIKE', "%$q%")->paginate(6)->withQueryString();
        return view('home', compact('subjects'));
    }
}
