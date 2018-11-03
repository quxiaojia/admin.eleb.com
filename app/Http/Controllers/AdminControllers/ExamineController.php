<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminModels\Shop;
use App\AdminModels\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExamineController extends Controller
{
    //审核

    //列表
    public function index(){

    }

    //新增
    public function create(){

    }

    public function store(){

    }


    //修改
    public function edit(){

    }

    public function update(Request $request,Shop $examine){
           // dd($examine);
        if($request->adopt){
            $examine->update([
                'status'=>1
            ]);
            $dates = Shop::where('status',0)->get();
            //dd($dates);
            return view('examine.add',compact('dates'));
        }
        if($request->disable){
            $examine->update([
                'status'=>-1
            ]);
            $dates = Shop::where('status',0)->get();
            //dd($dates);
            return view('examine.add',compact('dates'));
        }
    }

    //删除
    public function destroy(){

    }

    //查看
    public function show(){
/*        $dates = DB::select("SELECT
users.id,users.`name`,
shops.shop_name,shops.shop_img,shops.shop_rating,shops.brand,shops.on_time,shops.fengniao,shops.bao,shops.piao,shops.zhun,shops.start_send,shops.send_cost,shops.notice,shops.discount,shops.status,
shop_categories.`name` as categories_name
FROM users
LEFT JOIN shops ON users.shop_id=shops.id
LEFT JOIN shop_categories ON shops.shop_category_id=shop_categories.id WHERE shops.status=0;");*/

        //$shops =Shop::all();
       // dd($dates);
        $dates = Shop::where('status',0)->get();
        //dd($dates);
        return view('examine.add',compact('dates'));
    }
}
