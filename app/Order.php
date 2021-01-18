<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'productId', 'status', 'userId'
    ];
    //  een order bevat 1 user
    public function user(){
        return $this->belongsTo(User::class);
    }
    // een order bevat een product
    public function product(){
        return $this->belongsTo(Product::class);
    }

}
