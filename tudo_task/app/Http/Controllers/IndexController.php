<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CovidData;
use App\Models\User;
use App\Models\HelpGuide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function index(){
        $latestData = CovidData::latest('update_date_time')->first();
        return view('welcome',compact('latestData'));
    }
     
    public function helpguide(){
        return view('help-guide');
    }
    public function store(Request $request)
    {
         //validate form
         $this->validate($request, [
           
            'url'     => 'required',
            'description'   => 'required'
        ]);
        //session uid
        $user = Auth::user();
        $userId = $user->id;

        // Create a new HelpGuide instance
        $helpGuide = new HelpGuide;
        $helpGuide->uid = $userId; // Assign the user ID instead of $request->userId
        $helpGuide->link = $request->url;
        $helpGuide->description = $request->description;
        $helpGuide->save();

       
        // Redirect or return a response
        return redirect()->back()->with('success', 'Message saved successfully');
  
    }
    public function mainhelpguide(){
       // $helpGuides = HelpGuide::all();
       $helpGuides = DB::table('help_guides')
    ->join('users', 'help_guides.uid', '=', 'users.id')
    ->select('help_guides.*', 'users.name')
    ->get();
        $users = User::all();

        return view('main', compact('helpGuides', 'users'));
     //   return view('main');
    }
}
