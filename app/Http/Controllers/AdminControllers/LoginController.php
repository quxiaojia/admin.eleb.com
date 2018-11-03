<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminModels\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Tests\DataCollector\DumpDataCollectorTest;

class LoginController extends Controller
{
    //视图
    public function index(){
        return view('login.login');
    }
    //登录
    public function store(Request $request){
        //dd($request->input());
       $this->validate($request,
            [
                'name'=>'required',
                'password'=>'required'
            ],
            [
                'name.required'=>'管理员账号不能为空',
                'password.required'=>'管理员密码不能为空',
            ]
            );

        if($request->password === $request->rpassword){
           /* $aa = Auth::attempt(['name'=>$request->name,'password'=>$request->password]) 'remember_token'=>$request->remember_token,   ;
            dd($aa);*/
            if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
                session()->flash('success','登录成功');
                return redirect()->route('business.index');
            }
            session()->flash('success','该管理员不存在,或密码错误');
            return redirect()->route('login/index');
        }
        session()->flash('success','两次密码输入不一致');
        return redirect()->route('login/index');
    }
    //删除
    public function destroy(){
        Auth::logout();
        session()->flash('success','成功退出！');
        return redirect()->route('login/index');
    }
    //修改个人资料
    public function edit(){
        return view('login.edit');
        return 1;
    }
    public function update(Request $request){
       // dd($request->input());
       // dd(auth()->user()->password);
        $password = auth()->user()->password;
            if(Hash::check("$request->password1",$password)){

            if($request->password2 === $request->password3){

                $password = Bcrypt($request->password2);
                auth()->user()->update(
                    [
                        'password'=>$password,
                    ]
                );
             /*   DB::table('admins')->update(
                    [
                        'password'=>$password,
                    ]
                );*/

                Auth::logout();
                session()->flash('success','修改密码成功，请重新登录');
                return redirect()->route('login/index');
            }
            session()->flash('success','新密码两次输入不一致');
            return view('login.edit');
        }else{
            session()->flash('success','旧密码输入错误');
            return view('login.edit');
        }
    }
}
