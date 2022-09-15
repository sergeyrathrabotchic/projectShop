<?php

namespace App\Http\Controllers;

use Faker\Factory ;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\NewsUser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews() : array 
    {
        $faker = Factory::create();
        $data = [];
        $news = new NewsUser();
        $data = $news->getNewsUser();
        //dd($data);

        /*for ( $i = 0; $i < 25; $i++ ) {
            if ($i >= 0 && $i <5 ){
                $data[] = [
                    'id' => $i,
                    'title' => $faker->jobTitle(),
                    'author' =>  $faker->userName(),
                    'image' => null,
                    'deckription' =>"<strong>" . $faker->sentence(10) . "</strong>",
                    'categoryId' => 1
                ];
            }
            if ($i > 5 && $i <= 10 ){
                $data[] = [
                    'id' => $i,
                    'title' => $faker->jobTitle(),
                    'author' =>  $faker->userName(),
                    'image' => null,
                    'deckription' =>"<strong>" . $faker->sentence(10) . "</strong>",
                    'categoryId' => 2
                ];
            }
            if ($i >= 10 && $i < 15 ){
                $data[] = [
                    'id' => $i,
                    'title' => $faker->jobTitle(),
                    'author' =>  $faker->userName(),
                    'image' => null,
                    'deckription' =>"<strong>" . $faker->sentence(10) . "</strong>",
                    'categoryId' => 3
                ];
            }
            if ($i >= 15 && $i < 20 ){
                $data[] = [
                    'id' => $i,
                    'title' => $faker->jobTitle(),
                    'author' =>  $faker->userName(),
                    'image' => null,
                    'deckription' =>"<strong>" . $faker->sentence(10) . "</strong>",
                    'categoryId' => 4
                ];
            }
            if ($i >= 20 ){
                $data[] = [
                    'id' => $i,
                    'title' => $faker->jobTitle(),
                    'author' =>  $faker->userName(),
                    'image' => null,
                    'deckription' =>"<strong>" . $faker->sentence(10) . "</strong>",
                    'categoryId' => 5
                ];
            }        
        }*/
        //dd($data);
        return $data;
    }
    public function getСategory() : array
    {
        $data = [];
        for ( $i = 0; $i < 5; $i++ ) {
            $data[] = [
                'categoryId' => $i,
                'category' => 'Категория №' . ($i + 1),
            ];
        }
        return $data;
        
    }
}
