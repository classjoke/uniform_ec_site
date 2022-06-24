<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Uniform;
class Order extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'quantity',
        'payment_status',
        'shipping_status',
        'order_date',
        'remarks_column',
        'uniform_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function uniform(){
        return $this->belongsTo(Uniform::class)->withTrashed();
    }
}