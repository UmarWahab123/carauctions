<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Auth\Events\Registered;
use Auth;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    { 
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register_user(Request $request){
            $id=$request->id;
            $data=$request->all();
            // dd($request);
            $data['password']=Hash::make($data['password']);
            if($id){
            $affected_rows = User::find($id)->update($data);
            }else{
            $affected_rows = User::create($data);
            }
            $response=array('response'=>$data,'status'=>1);
            return json_encode($response);

    }

    public function userregister(Request $request)
    {
        $id = $request->id;
        $modal = new User();
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['role_id']=2;
        $email_check=User::where('email',$request->email)->first();
        if(!empty( $email_check)){
            $response = array('response'=>'email already exists','status'=>0);
            return json_encode($response);
            exit();

        }
      
            $user =  $modal::create($data);


            event(new Registered($user));
            $response = array('response'=>'Your Account has been rgistered successfuly,Check your inbox for verification email','status'=>1);
            return json_encode($response);
    }

}
