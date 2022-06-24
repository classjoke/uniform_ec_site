<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uniform extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name','price','stock','image_path'];
    public $timestamps = false;
    
    public function order(){
        return $this->hasMany(Order::class);
    }
}
