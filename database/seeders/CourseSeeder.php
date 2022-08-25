<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [];

        if (($open = fopen(storage_path() . "/courses.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $courses[] = $data;
            }

            fclose($open);
        }
        if(!empty($courses)){
            foreach ($courses as $course) {
                Curso::create([
                    'nome' => $course[0],
                    'tipo' => $course[1],
                    'id_mp' => $course[2]
                ]);
            }
        }
    }
}
