<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Roll extends Model
{
    use Notifiable;
    //een roll kan bij meerdere gebruikers horen
    public function user(){
        return $this->hasMany(User::class, 'rollId', 'id');
    }

}
