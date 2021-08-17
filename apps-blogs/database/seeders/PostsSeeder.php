<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 20; $i++) {
            # code...

            Post::create([
                'id_user' => 2,
                'title' => 'judul' . $i,
                'image'=>'https://cdn4.buysellads.net/uu/1/3386/1525189943-38523.png',
                'content'=>'lorem ipsum dolor sit amet mey hausi kery asaj kebr, design aja ke  - '.$i,
                'id_categories'=>1
            ]);
        }
    }
}
