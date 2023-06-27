<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Helpers\CustomHelper;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $technologies = ['HTML', 'CSS', 'SCSS', 'JS', 'PHP', 'SQL', 'mySQL', 'Vue', 'Laravel'];

      foreach ($technologies as $technology) {
        $new_technology = new Technology();
        $new_technology->name = $technology;
        $new_technology->slug = CustomHelper::generateUniqueSlug($new_technology->name, new Technology());
        $new_technology->save();
      }
    }
}
