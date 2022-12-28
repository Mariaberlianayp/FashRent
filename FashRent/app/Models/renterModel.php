<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class renterModel extends Model
{
    use HasFactory;
    protected $table ="renter";
    protected $guarded = [];


    public function productfeedback(){
        return $this->hasMany(productfeedbackModel::class);
    }
<<<<<<< HEAD

    public function user(){
        return $this->belongsTo(User::class);
    }
=======
>>>>>>> 600e4ef (Model + migrate, kecuali entity room sama message)
}
