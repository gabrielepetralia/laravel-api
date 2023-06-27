<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTechnologiesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $projects = Project::all();
    $num_technologies = Technology::all()->count();

    foreach($projects as $project) {

      $technologies_ids = [];
      $rand = rand(2, $num_technologies);

      do {
        $technology_id = Technology::inRandomOrder()->first()->id;
        if(!in_array($technology_id, $technologies_ids)) {
          array_push($technologies_ids, $technology_id);
        }
      } while(count($technologies_ids) < $rand);

      for($i = 0; $i < count($technologies_ids); $i++) {
        $project->technologies()->attach($technologies_ids[$i]);
      }

    }

  }
}
