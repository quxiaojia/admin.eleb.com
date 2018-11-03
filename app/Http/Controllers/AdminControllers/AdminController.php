<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminModels\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //列表
    public function index(){

        $admins = Admin::paginate(5);
        return view('admin.list',compact('admins'));
    }
    //添加
    public function create(){
        return view('admin.add');
    }
    //添加
    public function store(Request $request){
     /*  $this->Validate(
           $request,
           [
               'name'=>'required',
               'email'=>'required',
           ],
           []
       );*/
       //哈希加密
        $password = Bcrypt($request->password);
        //dd($password);
        Admin::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$password,
               'remember_token'=>$request->remember_token,
            ]
        );
        //redirect()更改指向
       // return 1;
        return redirect()->route('admin.index');
    }
    //修改
    public function edit(Admin $admin){

       /* if(){}*/
        return view('admin.edit',compact('admin'));
    }
    public function update(Admin $admin,Request $request){
        // dd($admin);
       // dd($request->input());
        //反解密码

       if(Hash::check("$request->password1",$admin->password)){

            if($request->password2 === $request->password3){
                $password = Bcrypt($request->password2);
                $admin->update(
                    [
                        'name'=>$request->name,
                        'password'=>$password,
                        'email'=>$request->email,
                    ]
                );
                session()->flash('success','修改成功');
                return redirect()->route('admin.index');
            }
           session()->flash('success','新密码两次输入不一致');
           return view('admin.edit',compact('admin'));
        }else{
           session()->flash('success','旧密码输入错误');
           return view('admin.edit',compact('admin'));
       }
    }
    //删除
    public function destroy(Admin $admin){
        $admin->delete();
        session()->flash('success','删除成功');
        return redirect()->route('admin.index');
    }
    //查看
    public function show(){

    }
}
