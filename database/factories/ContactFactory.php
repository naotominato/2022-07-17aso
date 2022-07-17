<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender'=> rand(1, 2),
            'email' => $this->faker->safeEmail(),
            'postcode' => $this->faker->randomNumber(3).'-'. $this->faker->randomNumber(4),
            'address' => $this->faker->streetAddress(),
            'building_name' => $this->faker->realtext(10),
            'opinion' => $this->faker->realText(30)
        ];
    }
}
