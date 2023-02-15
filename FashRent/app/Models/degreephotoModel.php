<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class degreephotoModel extends Model
{
    use HasFactory;
    protected $table ="360_photo";
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(productModel::class);
    }
}
