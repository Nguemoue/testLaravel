<?php

namespace App\Models;

use App\Actions\QuotaDistributor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number','purcharser_id','order_date'
    ];

    function purchaser(){
        return $this->belongsTo(User::class,"purchaser_id");
    }

    function orderTotal(){
        $val = Order::query()->join("order_items","orders.id","=","order_items.order_id")
        ->join("products","order_items.product_id","=","products.id")->selectRaw("qantity * price as ordertotal ")->where("orders.id",'=',$this->id)->first("ordertotal")->ordertotal;
        return $val;
    }
    function items(){
        return $this->hasMany(OrderItem::class);
    }

}
