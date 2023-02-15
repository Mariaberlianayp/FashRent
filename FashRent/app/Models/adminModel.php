<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminModel extends Model
{
    use HasFactory;
    protected $table ="admin";
    protected $guarded = [];

    public function product(){
        return $this->hasMany(productModel::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function banner(){
        return $this->hasMany(bannerModel::class);
    }

}
