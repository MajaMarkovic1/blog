<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Blogging',
            'Freelancing',
            'How to Succed',
            'Intenet Marketing',
            'Miscellaneous'
        ];

        App\Tag::truncate();//brisanje podataka iz tabele, ne tabelu

        foreach($values as $value){
            App\Tag::create([
                'name' => $value
            ]);
        }

        App\Post::all()->each(function (App\Post $p) use ($values){
            $rndIds = App\Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
            //pluck pravi niz id
            $p->tags()->attach($rndIds);
        });
    }
}
