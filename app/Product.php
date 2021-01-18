<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'description', 'image', 'price', 'subCategoriesId'
    ];
    // een product heeft 1 sub categorie
    public function subCategorie(){
        return $this->belongsTo(SubCategorie::class);
    }

    // een order heeft meerdere producten
    public function order(){
        return $this->hasMany(Order::class);
    }

}
