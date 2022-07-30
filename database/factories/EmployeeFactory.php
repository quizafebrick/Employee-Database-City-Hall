<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_no' => $this->faker->unique()->bothify('EMP-#?#?#'),
            'emp_token' => Str::random(25),
            'link_token' => Str::random(50),
            'firstname' => Str::upper($this->faker->firstname()),
            'middlename' => Str::upper($this->faker->lastname()),
            'lastname' => Str::upper($this->faker->lastname()),
            'home_address' => Str::upper($this->faker->address()),
            'birthday' => $this->faker->dateTimeBetween('1990-01-01', 'now')
            ->format('d/m/Y'),
            'contact_person' => Str::upper($this->faker->name()),
            'contact_address' => Str::upper($this->faker->address()),
            'contact_no' => $this->faker->numerify('###########'),
            'applicant_no' => $this->faker->numerify('###########'),
            'position' => Str::upper($this->faker->jobTitle()),
            'office_id' => $this->faker->numberBetween(1, 38),
            'division' => $this->faker->state(),
            'gsis_no' => $this->faker->numerify('###########'),
            'tin_no' => $this->faker->numerify('#########'),
            'philhealth' => $this->faker->numerify('############'),
            'blood_type' => $this->faker->randomElement(array ('A', 'AB', 'B', 'O', 'A+', 'A-',  'B+', 'B-',  'O+', 'O-', 'AB+', 'AB-')),
            'detailed_office_id' => $this->faker->numberBetween(1, 38),
        ];
    }
}
