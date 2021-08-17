<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $a = 0;
        while ($a < 20) {
            # code...
            Category::create([
                'code_categories'=>'A00'.$a,
                'categories'=>'kategori ke'.$a
            ]);
            $a++;
        }
    }
}
