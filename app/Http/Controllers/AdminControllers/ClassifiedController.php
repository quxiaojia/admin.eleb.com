<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminModels\ShopCategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClassifiedController extends Controller
{
    //商家分类管理

    //列表
    public function index(){
        $classifieds = ShopCategorie::paginate(5);
        return view('classified.list',compact('classifieds'));
    }

    //新增
    public function create(){
        return view('classified.add');
    }

    public function store(Request $request){
        //dd($request->file());
        //表单验证
        //分类图片
        $path = '';
        if($request->file()){
            $path = $request->file('img')->store('public/classified_img');
            //修改图片路径
            $path = str_replace('public','http://admin.eleb.com/storage',$path);
        }
        //保存数据到数据库
        ShopCategorie::create([
            'name'=>$request->name,
            'status'=>$request->status,
            'img'=>$path,
        ]);
        return redirect()->route('classified.index');
    }


    //修改
    public function edit(ShopCategorie $classified){
       // dd($classified);
        return view('classified.edit',compact('classified'));
    }

    public function update(ShopCategorie  $classified,Request $request){
        if(!$request->img){
            $classified->update([
                'name'=>$request->name,
                'status'=>$request->status,
            ]);}else{
               //删除之前的图片
            Storage::delete("$classified->img");
            $path = $request->file('img')->store('public/classified_img');
            //修改图片路径
            $path = str_replace('public','http://admin.eleb.com/storage',$path);
            $classified->update([
                'name'=>$request->name,
                'status'=>$request->status,
                'img'=>$path,
            ]);
            }
        return redirect()->route('classified.index');
    }

    //删除
    public function destroy(ShopCategorie $classified){
        $classified->delete();
        session()->flash('success','删除成功');
        //跳转
        return redirect()->route('classified.index');
    }

    //查看
    public function show(){

    }
}
