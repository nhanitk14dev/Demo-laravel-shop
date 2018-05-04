<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//sử dụng lệnh auth
use App\Models\User;
use Hash;
use App\Events\SendPasswordMailEvent;
use App\Events\SendSecretMailEvent;
use Mail;
use Session;
class UserController extends Controller
{

    public function register()
    {
        return view('frontend.register');
    }


    public function postRegister(Request $req)
    {
        $this->validate($req,
            [
                'name'=>'required|unique:users,name',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:5',
                'password2'=>'required|same:password',
                'phone'=>'min:10|max:11',
                'address'=>'required'
            ],
            [
                'name.required'=>'Vui lòng nhập vào tên',
                'name.unique'=>'Tên này đã tồn tại !',
                'email.required'=>'Vui lòng điền vào email !',
                'email.unique'=>'Email đã tồn tại !',
                'email.email'=>'email không đúng định dạng @email.com',
                'password.min'=>'mật khẩu chứa ít nhất 5 ký tự',
                'password.required'=>'Vui lòng điền vào mật khẩu !',
                'password2.required'=>'Nhập vào mật khẩu xác nhận',
                'password2.same'=>'Mật khẩu không trùng khớp',
                'phone.min'=>'Số điện thoại ít nhất 10 đến 11 số',
                'address.required'=>'Nhập vào địa chỉ liên hệ'

            ]   
            );
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->userdetail->phone = $req->phone;
        $user->userdetail->address=$req->address;
        $user->active = '1';
        $user->active_code = '0';
        $user->roles->role_id = '2';

        dd($user);
        //$user->save();
        //ROLE customer ->id_role:0

        //return redirect()->route('trangchu')->with('thongbao','Bạn đã đăng kí thành công !');

    }

    //controller đăng nhập cho người dùng
    public function getLogin()
    {
    	return view('frontend.login');
    }
    public function postLogin(Request $req)
    {
    	$this->validate($req,
    		[
    			'email'=>'required|email',
    			'password'=>'required|min:5'
    		],
    		[
    			'email.required'=>'Vui lòng điền vào email !',
    			'email.email'=>'email không đúng định dạng @email.com',
    			'password.min'=>'mật khẩu chứa ít nhất 5 ký tự',
    			'password.required'=>'Vui lòng điền vào mật khẩu !'
    		]	
    		);
        $dl = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($dl, $remember = true)) {
            
            return redirect()->route('trangchu');

        }
        else
        {
           return redirect()->back()->with('loi','Đăng nhập thất bại, vui lòng kiểm tra lại !');
        }
        //$a = Customer::where('email','$req->email')

        /*$a = Customer::all('email','password')->first();
        
        if (($a['email']) == $req->email ) {

        	return view('frontend.page.trangchu')->with('thongbao','Bạn đã đăng nhập thành công !');
        }
        else{
        	
        	return redirect()->back()->with('loi','Đăng nhập thất bại, vui lòng kiểm tra lại !');
        }*/
    }
    //controller đăng xuất cho ngươi dùng
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }
    //quen mat khau
    public function getForget()
    {
        return view('frontend.forget');
    }
    public function postForget(Request $req){
        $this->validate($req,
            [
                'mail' => 'required|email'
            ]
        );

        $users = User::all();
        foreach ($users as $key => $value) {
            if($value->email == $req->mail){
                                    
                $pass = str_random(8);

                $user = User::where('email',$req->mail)->first();
                $user->password = Hash::make($pass);
                $user->update();


                $data = ['ten'=>$value->name,'mail'=>$value->email,'pass'=>$pass];
                event(new SendPasswordMailEvent($data));

                return back()->with('thongbao','Vui lòng kiểm tra mail');
            }
        }
        //dd($data);
        return back()->with('thongbao','Mail không chính xác');
    }

}
