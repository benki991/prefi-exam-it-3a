<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id'    => rand(1,10),
            'subject_code'  => 'IT' . rand(1000,2000),
            'name'          => array_rand(['SYSTEM ADMIN' => 'SYSTEM ADMIN', 'DBMS' => 'DBMS']),
            'description'   => $this->faker->paragraph(2),
            'instructor'    => $this->faker->name(),
            'schedule'      => 'test',
            'prelims'       => rand(1,5),
            'midterms'      => rand(1,5),
            'prefinals'     => rand(1,5),
            'finals'        => rand(1,5)
        ];
    }
}
