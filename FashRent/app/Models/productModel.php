<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    protected $table ="product";
    protected $guarded = [];

    public function degreephoto(){
        return $this->hasMany(degreephotoModel::class);
    }

    public function category(){
        return $this->belongsTo(categoryModel::class);
    }

    public function productfeedback(){
        return $this->hasMany(productfeedbackModel::class);
    }

    public function productImage(){
        return $this->hasMany(productimageModel::class);
    }
}
