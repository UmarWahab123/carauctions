<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Test\Result;
use App\Models\Test\QuestionTranslations;
use App\Models\Training\TrainingResource;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //    $this->middleware(['auth','verified']);
    // }
    public function frontend()
    {
        return view('frontend.layout.header');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['users'] =User::get();
        $data['alltraining']=TrainingResource::get();
        $data['tutorial'] = TrainingResource::where('type','tutorial')->get();
        $data['course'] = TrainingResource::where('type','course')->get();
        $data['video'] = TrainingResource::where('type','video')->get();
        $data['certifiedcourses'] = TrainingResource::where('type','certifiedcourses')->get();
        $data['published'] =  TrainingResource::where('status',"Published")->get();

        return view('dashboard.index',compact('data'));
    }
}
