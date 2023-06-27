<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Helpers\CustomHelper;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $types = ['Front End', 'Back End', 'Full Stack', 'WordPress', 'PrestaShop'];

      foreach ($types as $type) {
        $new_type = new Type();
        $new_type->name = $type;
        $new_type->slug = CustomHelper::generateUniqueSlug($new_type->name, new Type());
        $new_type->save();
      }
    }
}
