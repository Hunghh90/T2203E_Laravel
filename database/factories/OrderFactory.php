<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'oder_date'=>now(),
            'fist_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'country'=>$this->faker->country,
            'city'=>$this->faker->city,
            'state'=>$this->faker->country,
            'postcode'=>$this->faker->postcode,
            'email'=>$this->faker->email,
            'notes'=>$this->faker->text,
            'grand_total'=>0,
            'shipping_address'=>$this->faker->address,
            'customer_tel'=>$this->faker->phoneNumber,
            'status'=>$this->faker->boolean
        ];
    }
}
