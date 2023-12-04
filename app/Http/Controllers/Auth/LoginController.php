<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/admin/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(){
        return view('auth.login');
    }
    public function userlogin(Request $request)
    {
       // $users=User::get();
       // foreach ($users as $key => $value) {
       //     $user=User::find($value->id)->update(['password'=>bcrypt(123456)]);
       // }
       // dd('sdaf');
        $email = $request->get('email');
        $password = $request->get('password');
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);


        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user=Auth::user();
            // dd($user);
            if($user->status=="Inactive"){
                Auth::logout();
                Session::put("login_error",'Sorry! Your account is suspended. Contact our support team for further info');
                return redirect('/admin/login');
            }
         return redirect(app()->getLocale().'/admin/home');
        }
        else
        {
            Session::put("login_error",'Credentials do not match our records');
            return redirect('/admin/login');
        }

        // $SiteUser = Login::where('email',$request->email)->where('password',md5($request->password))->first();
        // dd($SiteUser);
        // session_start();

        // if($SiteUser)
        // {
        // Session::put('login', $SiteUser);


        //     return Redirect('/home');
        // }
        // else
        // {
        //     return redirect('/login');
        // }
    }

     public function applogin(Request $request){
          $data=$request->all();
        //   dd($data);
          //$remember=$data['checkbox_remember_me'];
          $data=$data['userDetails'];
          $email=$data['email'];
          $password=$data['password'];
          $data=array(
              'status'=>0,
          );
           if (Auth::attempt(['email' => $email, 'password' => $password])) {
                 $user = Auth::user();
                //  $_SESSION['user']=$user;
                // Session::put("user",$user);
        //   $user=User::where('email',$email)->where('password',\Hash::check(request('password'),$password))->first();
        //   dd($user);
          if ($user) {
                  $data=array(
                      'id'=>$user->id,
                      'role_id'=>$user->role_id,
                      'first_name'=>$user->first_name,
                      'last_name'=>$user->last_name,
                      'last_name'=>$user->last_name,
                      'email'=>$user->email,
                      'phone_number'=>$user->phone_number,
                      'hide_msg'=>$user->hide_msg,
                      'dp'=>$user->dp,
                      'status'=>1,
                  );
          // dd($user);
          }
           }
        // $get=Session::get('user');
        // dd($get);
          $response = array('response' => $data);
           //dd($response);
          return json_encode($response);
   }
 
    public function chat(){
        return view('test.test');
    }
 

     public function get_user($id)
     {
         $data=User::where('id',$id)->first();
          $response = array('response' => $data);
           //dd($data);
          return json_encode($response);
     }

     public function forgot_password(){
          return view('auth.forgotpassword');
       }

  public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $user_exist= User::where('email','=', $user->email)->first();

        if(!empty($user_exist))
        {
             auth()->login($user_exist, true);
        }
        
        else
        {

            // only allow people with @company.com to login
            $data = array('name'=>$user->name,'email'=>$user->email,
                'role_id'=>2);

            $newuser = new User;
            $newuser->name   = $user->name;
            if(!empty($user->email))
            {
                $newuser->email = $user->email;
            }
            else
            {
                $newuser->email  = 'test123@gmail.com';
            }

            $newuser->role_id = 2;
            $newuser->password = 123456;
            $newuser->email_verified_at = now()->timestamp;
            $newuser->save();
            auth()->login($newuser, true);
        }
         return redirect(app()->getLocale().'/userdashboard');
        
    }

    public function redirectTofacebook()
    {
        return Socialite::driver('facebook')->redirect();

       
    }
    public function handleProviderfacebook()
    {
        

        try {
            $user = Socialite::driver('facebook')->user();

        } catch (\Exception $e) {
            return redirect('/login');
        }
        $user_exist= User::where('email','=', $user->email)->first();


        if(!empty($user_exist))
        {
             auth()->login($user_exist, true);
        }
       

        else{
       
                $data = array('name'=>$user->name,'email'=>$user->email,
                    'role_id'=>2);


                $newuser = new User;
                $newuser->name   = $user->name;

                if(!empty($user->email))
                {
                    $newuser->email = $user->email;
                }
                else
                {
                    $newuser->email  = 'test123@gmail.com';
                }
               
                $newuser->role_id = 2;
                $newuser->password = 123456;
                $newuser->email_verified_at = now()->timestamp;
                $newuser->save();
                auth()->login($newuser, true);
            }
        
        // $newUser->avatar_original = $user->avatar_original;

         return redirect(app()->getLocale().'/userdashboard');
    }


}
