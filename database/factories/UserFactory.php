<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MainCategorie;
use App\Order;
use App\Product;
use App\Roll;
use App\SubCategorie;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'rollId' => function(){
            return factory(App\Roll::class)->create()->id;
        }
    ];
});
$factory->define(Roll::class, function (faker $faker){
    return[
        'name' => $faker->title
    ];
});
$factory->define(Order::class, function (faker $faker){
   return[
       'status'=> random_int(1, 3),
       'userId' => function () {
           return factory(App\User::class)->create()->id;
       },
       'productId' => function(){
       return factory(App\Product::class)->create()->id;
       }
   ];
});
$factory->define(MainCategorie::class, function (faker $faker){
    static $count = 0;

    $array = ['Boeketten', 'Lossebloemen', 'Bollen', 'Stukjes'];
    return [
        'name' => $array[$count++]
    ];
});
$factory->define(SubCategorie::class, function (faker $faker){
    static $count = 0;

    $array = ['Plukboeketten', 'Valentijn', 'Gelegenheid', 'Rouw', 'Boeketten', 'Lossebloemen', 'Bollen', 'Stukjes'];
    return [
        'name' => $array[$count++],
//        'mainCategoriesId' => MainCategorie::all()->random()->id
    ];
});
$factory->define(Product::class, function (faker $faker){
    return [
        'name'          => $faker->name,
        'price'         => $faker->randomDigit,
        'subCategoriesId' => SubCategorie::all()->random()->id,
        'image' => $faker->imageUrl()
        //'description' => $faker->paragraphs
    ];
});
