<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    use HasFactory;
    protected $table ="category";
    protected $guarded = [];

    public function product(){
        return $this->hasMany(productModel::class);
    }
}
