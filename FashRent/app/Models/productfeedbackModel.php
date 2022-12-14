<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productfeedbackModel extends Model
{
    use HasFactory;
    protected $table ="product_feedback";
    protected $guarded = [];

    public function renter(){
        return $this->belongsTo(renterModel::class);
    }

    public function product(){
        return $this->belongsTo(productModel::class);
    }
}
