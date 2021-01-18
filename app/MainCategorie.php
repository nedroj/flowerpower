<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use \Illuminate\Notifications\Notifiable;
class MainCategorie extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];
    //een maincat kan bij meerdere subcat hebben
//    public function subCategorie(){
//        return $this->hasMany(SubCategorie::class, 'subCategoriesId', 'id');
//    }
}
