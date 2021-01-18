<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubCategorie extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'mainCategoriesId'
    ];
    // een subcat kan maar 1 main hebbem
//    public function mainCategorie(){
//        return $this->belongsTo(MainCategorie::class);
//    }
    // een subcourse bevat meerdere producten
    public  function product(){
        return $this->hasMany(Product::class, 'subCategoriesId', 'id');
    }
}
