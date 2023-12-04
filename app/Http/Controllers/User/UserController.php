<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyController;

use Illuminate\Http\Request;
use App;
use App\Models\Role\Role;
use App\Models\Bid\Bid;
use App\Models\User;
use App\Models\Privileges\RolePrivileges;
use App\Models\Countries\Countries;
use App\Models\Countries\State;
use App\Models\Countries\City;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Training\Like;
use App\Models\Comment\Comment;
use App\Models\Lot\Lot;

use App\Models\Training\TrainingResource;
class UserController extends Controller
{
  
    public  function role($lang,$id = -1)
    {
        $data['page_title'] = "Add Role";
        if ($id != -1) {
            $data['page_title'] = "Update Role";
            $data['results'] = Role::where('id', $id)->first();
        }
        return view('roles.save', compact('data'));
    }
    public function userstatus(Request $request){
        $id = $request->id;
        $data = $request->all();
        $affected_rows = User::find($id)->update($data);
        $response=array('status'=>1,'msg'=>'Data Updated');
        $response=json_encode($response);
        return $response;
    }
    public function saverole(Request $request)
    {
        $id = $request->id;
        $data = $request->all();

        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = Role::find($id);
            $affected_rows = $modal->update($data);
        } else {
            $affected_rows =  Role::create($data);
        }
        $message=   set_message($affected_rows,'Role',$action);
        Session::put('message', $message);
        return Redirect(app()->getLocale().'/admin/roles');
    }
    public  function roles()
    {
        $data['results'] =  Role::get();
        return view('roles.index', compact('data'));
    }
    public function deleterole($lang,$id)
    {
        $affected_rows = Role::find($id)->delete();
        $message=   set_message($affected_rows,'Role','Deleted');
        Session::put('message', $message);
        return redirect()->back();
    }
  
     public function role_access($lang,$id=-1)
    {
       
        $data['page_title'] ='Role Access';
        $data['roles'] = Role::where('role_title','!=','Admin')->get();
        $data['role']=Role::find($id);
        if(empty($data['role']))
        {
            $data['role_access']= json_encode(array());
            $data['access']= array();
        }
        else{
            $data['role_access']= json_decode($data['role']->role_access);
            if($data['role_access']){
                $data['role_access']= implode(',',$data['role_access']);
            }

            $data['access']=RolePrivileges::where('role_id',$id)->pluck('access')->toArray();
        }
//        dd($data['access']);

        return view('roles.role_access',compact('data'));
    }
 public function saveroleaccess(Request $request)
    {
//        dd($request->role_access);
        if($request->role_access){
            RolePrivileges::where('role_id',$request->role_id)->delete();
            foreach ($request->role_access as $key=>$value){
                $data = array(
                    'access'=>$value,
                    'role_id'=>$request->role_id,
                );
//                dd($value);
                $modal=RolePrivileges::create($data);
            }
        }
//        dd(implode(',',$request->access));
        $data = array(
            'role_access'=>json_encode($request->access),
        );
        $modal=Role::find($request->role_id);
       // dd($data);

        $affected_rows=$modal->update($data);
        if($affected_rows>0) {
            $message['title']= 'Success';
            $message['text'] = 'Access Permissions Updated Successfully';
        }
        else {
            $message['title']= 'Error';
            $message['text'] = 'Something went wronog';
        }
        Session::put('message', $message);
        return Redirect(app()->getLocale().'/admin/role_access/'.$request->role_id);
    }
    public  function users()
    {
        $data['page_title'] = "Users";
        $data['results'] =  User::get();
        return view('users.index', compact('data'));
    }
    public  function user($lang,$id = -1)
    {
        $data['page_title'] = "Add User";
        $data['roles'] = Role::get();
        $data['results'] = User::where('id', $id)->first();
       
        $data['countries']=Countries::get();
        $data['delivercountries']= Countries::get();

        if ($id != -1) {
            $data['page_title'] = "Update User";
            $data['results'] = User::where('id', $id)->first();
            $data['state']=State::where('country_id',$data['results']->country)->get();
            $data['city']=City::where('state_id',$data['results']->region)->get();

            $data['deliverstate']=State::where('country_id',$data['results']->delivery_country)->get();
            $data['delivercity']=City::where('state_id',$data['results']->delivery_region)->get();
            
        }
        return view('users.save', compact('data'));
    }
    public function saveuser(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
     
        unset($data['cpassword']);
 
        $action = "Added";
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        // dd($data);
        if ($id) {
            $action = "Updated";
            $affected_rows = User::find($id)->update($data);
        } else {
         $email_exist=User::where('email',$request->email)->first();
        if(!empty($email_exist)){
        Session::put("email_error",'Email is already exist ! Please Try a valid email');
        return Redirect(app()->getLocale().'/admin/user');
        }
            $affected_rows =  User::create($data);
        }
        $message=   set_message($affected_rows,'User',$action);
        Session::put('message', $message);
        return Redirect(app()->getLocale().'/admin/users');
    }

    public function deleteuser($lang,$id)
    {
        $affected_rows = User::find($id)->delete();
        $message=   set_message($affected_rows,'User','Deleted');
        Session::put('message', $message);
        return Redirect(app()->getLocale().'/admin/users');
    }
    public function userprofile($lang,$id=-1)
    {
        if($id==-1){
            $id=Auth::user()->id;
        }
        $data['users']=User::where('id',$id)->first();
        $data['user']=User::where('id', '!=', auth()->id())->get();
        $data['lot']=Lot::get();

        $data['bid'] =  Bid::where('user_id',$id)->with('user','lotname','auction')->get();
         // dd($data['bid']);
        return view('profile.index',compact('data'));
    }
     public function adminlogout(){
        Auth::logout();
        Session::flush();
        return redirect(app()->getLocale().'/admin/login');
    }
    
    public function get_states($lang,$id){

            $states= State::where('country_id',$id)->get();
            $options='';

            foreach($states as $state){

              $options.='<option value='.$state->id.'>'.$state->name.'</option>';

            }

           // dd($options);

        return $options;

   } 

   public function get_cities($lang,$id){

            $cities= City::where('state_id',$id)->get();

            // dd($states);

            $options='';

            foreach($cities as $city){

              $options.='<option value='.$city->id.'>'.$city->name.'</option>';

            }

           // dd($options);

        return $options;

   }

    public function get_deliverstates($lang,$id){

            $states= State::where('country_id',$id)->get();
            $options='';

            foreach($states as $state){

              $options.='<option value='.$state->id.'>'.$state->name.'</option>';

            }

           // dd($options);

        return $options;

   } 

   public function get_delivercities($lang,$id){

            $cities= City::where('state_id',$id)->get();

            // dd($states);

            $options='';

            foreach($cities as $city){

              $options.='<option value='.$city->id.'>'.$city->name.'</option>';

            }

           // dd($options);

        return $options;

   }

}

?>
