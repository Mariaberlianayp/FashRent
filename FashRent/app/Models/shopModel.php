<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopModel extends Model
{
    use HasFactory;
    protected $table ="shop";
    protected $guarded = [];

    public function product(){
        return $this->hasMany(productModel::class);
    }
<<<<<<< HEAD

    public function user(){
        return $this->belongsTo(User::class);
    }
=======
>>>>>>> 600e4ef (Model + migrate, kecuali entity room sama message)
    
}
