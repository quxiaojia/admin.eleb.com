<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable =['name','password','shop_id','status','email','remember_token'];

    //模型关联
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
