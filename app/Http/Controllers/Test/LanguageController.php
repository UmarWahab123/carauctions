<?php
namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Test\Settings;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Models\Test\Language;
use App\Models\Test\LanguageTranslations;
class LanguageController extends Controller
{
    public function savelangsettings(Request $request){
        $id=$request->id;
        $data=$request->all();
        $action="Added";
        // dd($data);
        if($id){
            $action="Updated";
            $affected_rows = LanguageTranslations::find($id)->update($data);
        }
        else{
            $affected_rows =  LanguageTranslations::create($data);
        }
        Session::put('message', set_message($affected_rows,'Tanslation Settings',$action));
        return redirect()->back();
    }  

    public function savelanguage(Request $request){
        $id=$request->langid;
        $data=$request->all();
        unset($data['_token']);
        $action="Added";
        if($id){
            $action="Updated";
            $affected_rows = Language::where('langid',$id)->update($data);
        }
        else{
            $affected_rows =  Language::create($data);
        }
        Session::put('message', set_message($affected_rows,'Language',$action));
        return redirect()->back();
    }
    public  function languages(){
        $data['page_title'] = "Languages";
        $data['results'] =  Language::get();
        return view('language.index',compact('data'));
    }
    public function deletelanguage($id){
        $affected_rows = Language::where('langid',$id)->delete();
        Session::put('message', set_message($affected_rows,'Language','deleted'));
        return redirect()->back();
    }

}