<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


// Models
use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');

        foreach ($comics as $comic) {
           $newComic = new Comic;
           $newComic->title= $comic['title'];
           $newComic->description=$comic['description'];
           $newComic->image=$comic['thumb'];
           $newComic->price=$comic['price'];
           $newComic->series=$comic['series'];
           $newComic->sale_date=$comic['sale_date'];
           $newComic->type=$comic['type'];
           $newComic->save();
        }
    }
}
