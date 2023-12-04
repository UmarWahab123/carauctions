<?php
namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Settings;
use App\Models\User;
use App\Models\Training\Like;
use App\Models\Comment\Comment;
use App\Models\Training\TrainingResource;
use App\Models\Setting\ContactUs;

use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function layoutmode(){
        $layoutmode="light-layout";
        if(Session::has('layoutmode')){
            $layoutmode=Session::get('layoutmode');
            if($layoutmode=="light-layout"){
             $layoutmode="dark-layout";
            }else{
             $layoutmode="light-layout";
            }
        }
        Session::put('layoutmode', $layoutmode);
        $response=array('layoutmode'=>$layoutmode);
        return json_encode($response);
    }
    public function settings(Request $request)
    {
        $data['page_title'] = "Update Settings";
        $data['results'] =  Settings::get()->first();
        //  dd(  $data['results']);
        return view('setting.index' ,compact('data'));

    }
    public function saveportalsettings(Request $request)
    {
        $id = $request->id;
        $modal = new Settings;
        $data = $request->all();
// dd($data);
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . "." . $extension;
            $file->move('public/uploads/products/', $filename);
            $data['logo'] = '/uploads/products/' . $filename;

            $request->logo = $data['logo'];
        }
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = Settings::find($id);
            $affected_rows = $modal->update($data);
        } else {

            $modal =  $modal::create($data);
        }
        $message=   set_message($affected_rows,'Settings',$action);
        Session::put('message', $message);
        return Redirect(app()->getLocale().'/admin/settings');

    }



    public function profile($id){
        $data=User::where('id',$id)->first();
          $response = array('response' => $data);
           //dd($data);
          return json_encode($response);
    }

    public function update_profile(Request $request)
    {
       $id=$request->id;
       $data=$request->all();

       $data['name']=$data['first_name']." ".$data['last_name'];
        $data['user_name']=$data['first_name'];
        unset($data['role']);
        // dd($data);

       if($id){
           $modal = User::find($id)->update($data);
       }else{
            $affected_rows = User::create($data);
       }
          $response = array('response' => $data);
           //dd($data);
          return json_encode($response);
    }

 public function upload_file(Request $request){
        $path=$_GET['url'];
        $path = str_replace('-', '/', $path);
        if ( !empty( $_FILES ) ) {
            $date = new \DateTime();
            $current_dir=str_replace('uploads','',getcwd());
            $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
            $name=str_replace(' ', '', $_FILES['file']['name']);
            $filename=$date->getTimestamp().'-'. $name;
//            $filename=$name;
            $uploadPath = $current_dir.$path. DIRECTORY_SEPARATOR .$filename;
//            print_r($uploadPath); exit;
            move_uploaded_file( $tempPath, $uploadPath );
            $answer = array( 'answer' => 'File transfer completed' );
            $json = json_encode( $answer );
            $newFileName = $path.'/'.$filename;
            echo $newFileName;
        } else {
            echo 'No files';
        }
    }
     public function deletefiles(Request $request){
        $ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
        $storeFolder = 'uploads';
        $fileList = $_POST['fileList'];
        $path = $_POST['path'];
        $targetPath = getcwd(). $fileList;
         $path = str_replace('/', '/', $path);
         //dd(trim($fileList));
        if(isset($fileList)){
            unlink($targetPath.$fileList);
        }
    }


    public function contactus(){
        $data['contact']=ContactUs::get();

        return view("setting.contactus",compact('data'));
    }

    public function deletecontactus($lang,$id){
         $affected_rows = ContactUs::find($id)->delete();
        $message=   set_message($affected_rows,'Contact','Deleted');
        Session::put('message', $message);
        return redirect()->back();
    }

    
}
?>
