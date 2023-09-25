<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];


    public function phone(){return $this->belongsTo(Phone::class);}
    public function monthly(){return $this->belongsTo(Monthly::class);}
}
