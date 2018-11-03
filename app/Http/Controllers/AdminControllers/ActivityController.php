<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminModels\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //活动管理
    public function index(Request $request){
       // dd($request);
        $datas = Activity::paginate(5);
        $activity_date = $request->activity_date;
        //活动条件查询
        //当前时间
        $now_date = date('Y-m-d');
      if($request->activity_date){
            if($request->activity_date == 1){
                //未开始
                $datas =Activity::whereDate('start_time','>',$now_date)->paginate(5);
            };
            if($request->activity_date == 2){

                $datas =Activity::whereDate('start_time','<',$now_date)->whereDate('end_time','>',$now_date)->paginate(5);
            };
            if($request->activity_date == 3){
                //已结束
                $datas =Activity::whereDate('end_time','<',$now_date)->paginate(5);
            };
        }

        //dd($data);
        return view('activity.list',compact('datas','activity_date'));
    }
    //新增
    public function create(){
        return view('activity.add');
    }
    public function store(Request $request){
        //dd($request->input());
        Activity::create(
            [
            'title'=>$request->title,
            'content'=>$request->input('content'),
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            ]
        );
        session()->flash('success','添加成功');
        return redirect()->route('activity.index');
    }
    //修改
    public function edit(Activity $activity){
        return view('activity.edit',compact('activity'));
    }
    public function update(Request $request,Activity $activity){
        //dd($request->input());
        if($request->start_time&&!$request->end_time){
            //return '只修改开始时间';
            $activity->update(
                [
                    'title'=>$request->title,
                    'content'=>$request->input('content'),
                    'start_time'=>$request->start_time,
                ]
            );
        }
        if(!$request->start_time&&$request->end_time){
           // return '只修改结束时间';
            $activity->update(
                [
                    'title'=>$request->title,
                    'content'=>$request->input('content'),
                    'end_time'=>$request->end_time,
                ]
            );
        }
        if(!$request->start_time&&!$request->end_time){
            //return '不修改时间';
            $activity->update(
                [
                    'title'=>$request->title,
                    'content'=>$request->input('content'),
                ]
            );
        }
        if($request->start_time&&$request->end_time){
            //return '修改开始与结束时间';
            $activity->update(
                [
                    'title'=>$request->title,
                    'content'=>$request->input('content'),
                    'start_time'=>$request->start_time,
                    'end_time'=>$request->end_time,
                ]
            );
        }
        session()->flash('success','修改成功');
        return redirect()->route('activity.index');
    }
    //删除
    public function destroy(Activity $activity){
        $activity->delete();
        session()->flash('success','删除成功');
        return redirect()->route('activity.index');
    }

}
