<?php

namespace App\Http\Controllers\AdminControllers;
use App\AdminModels\ShopCategorie;
use App\AdminModels\User;
use App\AdminModels\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class BusinessController extends Controller
{
    //商家管理
    //列表
    public function index(){

/*        $business = DB::select("SELECT
users.id,users.`name`,
shops.shop_name,shops.shop_img,shops.shop_rating,shops.brand,shops.on_time,shops.fengniao,shops.bao,shops.piao,shops.zhun,shops.start_send,shops.send_cost,shops.notice,shops.discount,
shop_categories.`name` as categories_name
FROM users
LEFT JOIN shops ON users.shop_id=shops.id
LEFT JOIN shop_categories ON shops.shop_category_id=shop_categories.id;");*/
       /*
       // $business = $data ->paginate(5);
        $business = $business->shop->id;*/
        $business = User::paginate(5);
     /* foreach($business as $busines){
           var_dump($busines->shop->id);
        }die;*/
        //dd($datas->shop->shop_category->id);

        return view('business.list',compact('business'));
    }

    //新增
    public function create(){


       $classifieds = ShopCategorie::all();
        //dd($classifieds);
        return view('business.add',compact('classifieds'));
    }

    public function store(Request $request){
         //dd($request->input());
        //表单验证
        //上传图片
        $path = '';
        if($request->file()){
            $path = $request->file('shop_img')->store('public/shop_img');
            //修改保存路径
            $path = str_replace('public','http://admin.eleb.com/storage',$path);
        }
        //保存数据到数据库

       $shop_data = Shop::create(
            [
                'shop_name' => $request->shop_name,
                'shop_category_id' => $request->shop_category_id,
                'discount' => $request->discount,
                'brand' => $request->brand,
                'on_time' => $request->on_time,
                'fengniao' => $request->fengniao,
                'bao' => $request->bao,
                'piao' => $request->piao,
                'zhun' => $request->zhun,
                'start_send' => $request->start_send,
                'send_cost' => $request->send_cost,
                'notice' => $request->notice,
                'status' => $request->status,
                'shop_img' => $path,
            ]
        );


      /*  $shop_id = DB::select("SELECT `id` FROM shops ORDER BY id DESC LIMIT 1;");
        $shop_id = $shop_id[0]->id;*/


        $shop_id = $shop_data->id;
        //dd($shop_id);

        User::create(
            [
                'name' => $request->name,
                'password' => $request->password,
                'shop_id' => $shop_id,
                'email'=>$request->email,
                'status' => 1
            ]
        );

        return redirect()->route('business.index');


    }


    //修改
    public function edit(User $business){

       // dd($business);
        $classifieds = ShopCategorie::all();
        return view('business.edit',compact('business','classifieds'));

    }

    public function update(User $business,Request $request){
        //dd($business->shop_id);
        //dd($request->input());
        if(!$request->shop_img){
            if(!$request->password){
                $business->update(
                    [
                        'name'=>$request->name,
                        'email'=>$request->email,
                    ]);
            }
            $business->update(
                [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$request->password,
                ]
            );
            DB::table('shops')->where('id',$business->shop_id)->update(
                [
                    'shop_name'=>$request->shop_name,
                    'shop_category_id'=>$request->shop_category_id,
                    'discount'=>$request->discount,
                    'brand'=>$request->brand,
                    'on_time'=>$request->on_time,
                    'fengniao'=>$request->fengniao,
                    'bao'=>$request->bao,
                    'piao'=>$request->piao,
                    'zhun'=>$request->zhun,
                    'start_send'=>$request->start_send,
                    'send_cost'=>$request->send_cost,
                    'notice'=>$request->notice,
                ]
            );
            return redirect()->route('business.index');
        }

        if($request->shop_img){

            //新增图片路径
                $path = $request->file('shop_img')->store('public/shop_img');
            //修改图片路径
            $path = str_replace('public','http://admin.eleb.com/storage',$path);
        /*   //删除之前服务器上的图片
            $shop_img =  DB::table('shops')->where('id',$business->shop_id)->select(
                [
                    'shop_img'
                ]
            )->get();
            $shop_img = $shop_img[0]->shop_img;

            $shop_img = str_replace('public','/storage/app/public',$shop_img);
            $shop_img = str_replace('http://admin.eleb.com/storage','/admin.eleb.com/storage/app/public',$shop_img);

            Storage::delete("$shop_img");
            dd($shop_img);*/

                if(!$request->password){
                    $business->update(
                        [
                            'name'=>$request->name,
                            'email'=>$request->email,
                        ]);
                }
                $business->update(
                    [
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>$request->password,
                    ]
                );
                DB::table('shops')->where('id',$business->shop_id)->update(
                    [
                        'shop_name'=>$request->shop_name,
                        'shop_category_id'=>$request->shop_category_id,
                        'discount'=>$request->discount,
                        'brand'=>$request->brand,
                        'on_time'=>$request->on_time,
                        'fengniao'=>$request->fengniao,
                        'bao'=>$request->bao,
                        'piao'=>$request->piao,
                        'zhun'=>$request->zhun,
                        'start_send'=>$request->start_send,
                        'send_cost'=>$request->send_cost,
                        'notice'=>$request->notice,
                        'shop_img'=>$path
                    ]
                );
            return redirect()->route('business.index');
            }

    }

    //删除
    public function destroy(User $business){
        $business->delete();
        //$business = User::paginate(5);
        return redirect()->route('business.index');
    }

    //查看
    public function show(){

    }
}
