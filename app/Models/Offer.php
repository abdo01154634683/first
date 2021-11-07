<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //laravel keyword used to connect model to table when model name and table name break the rules
    protected $table='offers';
    //laravel keyword used to determined columns that allow to store data in it
    protected $fillable=['id','name','price','details'];
    //laravel keyword used to determined column that can not return from database
    protected $hidden=['id'];
    //laravel keywords used to not allow of model to insert date into table
    public $timestamps=false;

}
