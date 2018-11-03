<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $fillable = ['shop_name','shop_category_id','discount','brand','on_time','fengniao','bao','piao','zhun','start_send','send_cost','notice','shop_img','status'];

    //模型关联
    public function shop_category(){
        return $this->belongsTo(ShopCategorie::class);
    }
}
