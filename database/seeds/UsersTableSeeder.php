<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* TODO probleem met seeder oplossen tijdenlijke oplossing eerst de categorieen en producten inladen daarna de rollen users en orders*/
//        factory(App\SubCategorie::class, 7)->create()->each(function ($s) {
//            factory(App\Product::class, 5)->create(['subCategoriesId' => $s->id]);
//        });
        factory(App\Roll::class, 2)->create()->each(function ($r){
            factory(App\User::class, 3)->create(['rollId' => $r->id])->each(function ($u){
                factory(App\Order::class, 3)->create(['userId' => $u->id]);
            });
        });
    }
}
