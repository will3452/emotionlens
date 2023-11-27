<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
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
        $filters = [
            ['archived_at', null], 
        ]; 

        if ($request->has('archived')) {
            $filters = [
                ['archived_at', '!=', null]
            ]; 
        }

        if (auth()->user()->type == User::TYPE_TEACHER) {
            array_push($filters, ['instructor_id', auth()->id()]); 
        } else  {
            $ids =  UserSubject::whereUserId(auth()->id())->get()->pluck('subject_id');
            $subjects = Subject::whereIn('id', $ids)->paginate(6);  
            return view('home', compact('subjects'));
        }

        

        $subjects = Subject::where($filters)->where('subject', 'LIKE', "%$q%")->paginate(6)->withQueryString();
        return view('home', compact('subjects'));
    }
}
