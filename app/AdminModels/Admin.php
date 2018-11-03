<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Notifications\Notifiable;

//class Admin extends Model
class Admin extends Auth
{
      use Notifiable;
    //
      protected  $fillable = ['name','password','remember_token','email'];
}
