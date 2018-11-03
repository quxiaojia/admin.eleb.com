<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminModels\Shop;
use App\AdminModels\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    //
    public function index(){

        $users = User::where('status',1)->paginate('5');
        //$users = User::paginate('5');
        //dd($users);
        return view('account.list',compact('users'));
    }

    //添加
    public function create(){
        $shops = Shop::all();
        //dd($shops);
        return view('account.add',compact('shops'));
    }
    public function store(Request $request){
        //dd($request->input());
        //密码加密
        $password =  Bcrypt($request->password);
        //新增用户
        User::create(
            [
                'name' =>$request->name,
                'password' =>$password,
                'email' =>$request->email,
                'status' => 1,
                'shop_id' => $request->shop_id,
                'remember_token' =>$request->remember_token,

            ]
        );
        session()->flash('success','商户新增成功');
        return redirect()->route('account.index');
    }
    //修改
    public function edit(User $account){
        //dd($account);
        return view('account.edit',compact('account'));
    }
    public function update(User $account,Request $request){
        //dd($request->input());
        //dd($account);
        if($request->password1 === $request->password2){
            $password = bcrypt($request->password1);
            $account->update(
                [
                    'password'=>$password
                ]
            );
            session()->flash('success','重置密码成功，请牢记新密码');
            return redirect()->route('account.index');
        }
        session()->flash('success','两次密码不一致');
        return view('account.edit',compact('account'));
    }
    //删除
    public function destroy(User $account){
        //dd($account);
        $account->delete();
        session()->flash('success','删除用户成功');
        return redirect()->route('account.index');
        //return 3;

    }
    public function disable(User $disable){
        $disable->update(
            [
                'status' => 0
            ]
        );
        return redirect()->route('account.index');
    }
    //查看
    public function show(){

    }
}
